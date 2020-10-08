@php
    $categories=App\Category::all();
@endphp
<div class="accordion" id="accordionExample">
    @foreach ($categories as $category)
        <div class="card">
            <div class="card-header" id="category-head-{{ $category->id }}">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#category-{{ $category->id }}" aria-expanded="true" aria-controls="category-{{ $category->id }}">
                    {{ $category->name }}
                </button>
            </h2>
            </div>

            <div id="category-{{ $category->id }}" class="collapse" aria-labelledby="category-head-{{ $category->id }}" data-parent="#accordionExample">
            <div class="card-body">
                <div class="list-group ">
                    @foreach ($category->items as $item)
                        <a href="#" v-on:click.prevent="addOrder({{ $item->id }},'{{ $item->name }}','item','{{ $item->price }}')" class="list-group-item list-group-item-action fb-item" >
                            {{ $item->name }}
                            <span class="badge badge-primary badge-pill float-right">$ {{ $item->price }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    @endforeach
</div>
