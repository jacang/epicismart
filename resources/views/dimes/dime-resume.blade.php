@php($currency = ' '.config('app.currency'))
<div class="col-md-12">
    <div class="col-md-4">
      {{number_format($dimeresume['dimeMoisEnCours'],0,""," ").$currency}}
    </div>
    <div class="col-md-4">
      {{number_format($dimeresume['dimeMoisPrecedent'],0,""," ").$currency}}
    </div>

    <div class="col-md-4 amountValue">
      @php($variationSigne = "variationUp")
      @if($dimeresume['dimeVariation'] < 0)
        @php($variationSigne = "variationDown")
      @endif
      <i class="fa fa-sort-asc {{$variationSigne}}"></i> <span class="amount">{{number_format($dimeresume['dimeVariation'],0,""," ").$currency}}</span>
    </div>
</div>
