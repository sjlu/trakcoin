@extends('base')

@section('container')

  <div class="page-header">
    <h1>Trakcoin <small>trading prices</small></h1>
  </div>

  @foreach($data as $currency => $sources)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">{{ $currency }}</h3>
      </div>
      <table class="table">
        @foreach ($sources as $source)
          <tr>
            <td>
              {{ $source->name }}
            </td>
            <td>
              ${{ $source->latest_price }}
            </td>
          </tr>
        @endforeach
      </table>
    </div>
  @endforeach

@stop
