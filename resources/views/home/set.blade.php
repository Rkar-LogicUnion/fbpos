@php
    $sets=App\Sets::all();
@endphp
<div class="card mb-3 border-success">
  <div class="card-header bg-success">
    Sets
  </div>
  <ul class="list-group list-group-flush">
      @foreach ($sets as $set)
        <li class="list-group-item">
            <a href="#" class="list-group-item list-group-item-action" v-on:click.prevent="addSets({{ $set->id }},'{{ $set->name }}','set','{{ $set->price }}')">
                {{ $set->name }}
                <br>
                @foreach ($set->items as $item)
                    <small>{{ $item->name }} ({{$item->pivot->quantity}}),</small>
                @endforeach
                <span class="badge badge-primary badge-pill float-right">$ {{ $set->price }}</span>
            </a>
        </li>
      @endforeach
  </ul>
</div>
