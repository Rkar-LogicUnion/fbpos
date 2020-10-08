@php
    $types=App\Type::all();
@endphp
<div class="card mb-3">
  <div class="card-header">
    Types
  </div>
  <ul class="list-group list-group-flush">
      @foreach ($types as $type)
        <li class="list-group-item">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="type-{{ $type->id }}" value="{{ $type->id }}" v-model="type">
                <label class="form-check-label" for="type-{{ $type->id }}">
                    {{ $type->name }}
                </label>
            </div>
        </li>
      @endforeach
  </ul>
</div>
