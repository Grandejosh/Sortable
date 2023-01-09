<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;

class SortTest extends Component
{

    public $frase_text;
    public $result_text = "aquí va el resultado";
    public $query_tokens = 0;
    public $result_tokens = 0;
    public $consumed_tokens = 0;
    public $parafrasear = false;
    public $modelo = "text-ada-001";
    public $finish_reason="*";

    public function render()
    {
        return view('livewire.sort-test');
    }

    public function save()
    {
        $max_tokens = 1500;
        $result = "";
        if ($this->modelo == "text-davinci-003") {
            $max_tokens = 2950;
        }

        $this->result_text = "espera el resultado...";
        if ($this->parafrasear) {
            $consulta = "parafrasea lo contenido entre los corchetes: [" . $this->frase_text . "]";
        } else {
            $consulta = $this->frase_text;
        }
        try {
            $result = OpenAI::completions()->create([
                'model' => $this->modelo,
                'prompt' => $consulta,
                'max_tokens' => $max_tokens,
            ]);

            $this->result_text = $result['choices'][0]['text'];
            $this->finish_reason = $result['choices'][0]['finish_reason'];
            $this->query_tokens = $result['usage']['prompt_tokens'];
            $this->result_tokens = $result['usage']['completion_tokens'];
            $this->consumed_tokens = $result['usage']['total_tokens'];
            $nro_consultas=1;
            if ((int)$this->consumed_tokens >= (int)$max_tokens) {
                $nro_consultas++;
                $result = OpenAI::completions()->create([
                    'model' => $this->modelo,
                    'prompt' => 'continua con el parafraseo',
                    'temperature' => 0.2, //0 a 1 -> hay que probar que numero es el mas adecuado para parafrasear
                    'max_tokens' => $max_tokens,
                ]);
                $this->result_text .= ' ' . $result['choices'][0]['text'];
                $this->query_tokens += $result['usage']['prompt_tokens'];
                $this->result_tokens += $result['usage']['completion_tokens'];
                $this->consumed_tokens += $result['usage']['total_tokens'];
            }

            $this->finish_reason = "se han hecho ".$nro_consultas." consulta/s seguidas para esta respuesta.";
        } catch (Exception $e) {
            $this->result_text = $e->getMessage();
        }

    }
    public function alert()
    {
        echo "<script>alert('carajo');</script>";
    }
}
