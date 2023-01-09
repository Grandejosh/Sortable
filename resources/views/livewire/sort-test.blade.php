<div style="margin-left: 30px">



<div class="uk-card uk-card-default uk-card-body">
<form wire:submit.prevent='save'>
    <input class="uk-form-controls" type="checkbox" wire:model="parafrasear" name="" id=""><p class="uk-text-bold">parafrasear</p>


    <div class="uk-form-controls">
        <label class="uk-label-danger">Escoge el modelo de IA a usar</label><br>
        <input type="radio" name="valor" value="text-davinci-003" wire:model="modelo"> Da Vinci ++++
        <input type="radio" name="valor" value="text-curie-001" wire:model="modelo"> Curie +++
        <input type="radio" name="valor" value="text-babbage-001" wire:model="modelo"> Babbage ++
        <input type="radio" name="valor" value="text-ada-001" wire:model="modelo"> Ada +
    </div>


    <textarea class="uk-input uk-text-primary uk-text-justify uk-form-controls" style="height: 150px" type="text" name="frase_text" id="frase_text" wire:model="frase_text" cols="30" rows="30" height="250px"></textarea>

    <button class="uk-button-large uk-flex-center" type="submit" wire:loading.attr="disabled" wire:target="save" wire:click.prevent="save" >Consultar</button>

</form>
<p>{{ $result_text }}</p><br>
<hr>
<label class="uk-alert-success">Tokens Consumidos en la consulta</label>
<p>{{ $query_tokens }}</p><hr>

<label class="uk-alert-success">Tokens Consumidos en la respuesta actual</label>
<p>{{ $result_tokens }}</p><hr>

<label class="uk-alert-success">Suma Total de Tokens Consumidos en esta oportunidad</label>
<p>{{ $consumed_tokens }}</p><hr>
</div>

<p>Modelo usado: {{ $modelo }}</p>
</div>
<p>motivo de termino de respuesta: {{ $finish_reason }}</p>
</div>




<!--




<hr>
<ul class="uk-child-width-1-6" uk-sortable="handle: .uk-card" uk-grid>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://www.dzoom.org.es/wp-content/uploads/2011/08/insp-cuadradas-1.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://www.dzoom.org.es/wp-content/uploads/2011/08/insp-cuadradas-13.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="data:image/jpeg;base64,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" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://www.soycarmin.com/__export/1637015723069/sites/debate/img/2021/11/15/uxas-cuadradas-tendencia-otoxo-2021-port.jpg_943222218.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://media.glamour.mx/photos/621eb495e581ee0110c0da76/1:1/w_900,h_900,c_limit/un%CC%83aspuntacuadrada1.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRY4set_tih4oYrQbtejfG6Geh6_8rEVWOegTmr09Yg3bIllLxVO8t6MbJCV-W8VwHp_ME&usqp=CAU" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQz2j7Oho6ZivZWMZpBbxmqjuLWdf4ouu_E8Q&usqp=CAU" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS69ezsW3jiSm2wOJa0ehvOZ6T3yeMS6lpNVYJtfJPkdaeXmiAci5v2Wp4kGcRnYfifpwY&usqp=CAU" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://sein.com.pe/pub/media/catalog/product/cache/image/700x560/e9c3970ab036de70892d86c6d221abfe/0/3/032201035.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_HLghyuLdm6etEtD4MZ8HabXo-xV6gJZx7Q&usqp=CAU" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://flowerbox.pe/wp-content/uploads/2021/07/Square-Box-Monserrat.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEMl3TKEs2DINccN2_4XwostnQQ2pEOWDAbw&usqp=CAU" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://cdn.xxl.thumbs.canstockphoto.com/vector-set-of-square-monsters-clipart-vector_csp13728255.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://home.ripley.com.pe/Attachment/WOP_5/2025303363698/2025303363698_2.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://www.masgamers.com/wp-content/uploads/2022/11/symbiogenesis-square-enix.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUgS1ouv4_yvmEOoWgs0HPk-UlksbmQ5V_bA&usqp=CAU" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body"><img src="https://static.wixstatic.com/media/375e17_c7b8dbefc1be4601939c7fa9a3fe0328~mv2.jpg/v1/fill/w_640,h_604,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/375e17_c7b8dbefc1be4601939c7fa9a3fe0328~mv2.jpg" alt=""></div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body">Item 18</div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body">Item 19</div>
    </li>
    <li>
        <div class="uk-card uk-card-default uk-card-body">Item 20</div>
    </li>
</ul>
<script>

var indexes = new Array();


$(document).on('moved', '.uk-sortable', function(e) {
  var currentLi = e.originalEvent.explicitOriginalTarget.parentNode;
  indexes = [];
  $(this).find('li').each(function() {
    indexes.push($(this).data("index"));
  });
  alert("New position: " + $(currentLi).index());
  console.log(indexes);
});

$('.uk-sortable').find('li').each(function(i) {
  $(this).data("index", i);
  indexes.push(i);
});
console.log(indexes);

</script>

<hr>
<input type="button" onclick="helper()" value="Helper">

<script language="JavaScript">
function helper()
{
   var head= document.getElementsByTagName('head')[0];
   var script= document.createElement('script');
   script.type= 'text/javascript';
   script.src= 'helper.js';
   head.appendChild(script);
}
</script>

</div>
-->
