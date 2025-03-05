@extends('user.layouts.app')
@section('content')
    <h1>{{ $organization->name }}</h1>
    <p>{{ $organization->description }}</p>
    <h2>Events</h2>
    <ul>
        @foreach ($organization->events as $event)
            <li>
                <a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a>
            </li>
        @endforeach
    </ul>
    <h2>Articles</h2>
    <ul>
        @foreach ($organization->articles as $article)
            <li>
                <a href="{{ route('articles.show', $article->id) }}">{{ $article->title }}</a>
            </li>
        @endforeach
    </ul>
    <h2>Merchandise</h2>
    <ul>
        @foreach ($organization->products as $product)
            <li>
                <form method="POST" action="{{ route('user.cart.add', $product->id) }}">
                    @csrf
                    {{ $product->name }} - Rp. {{ number_format($product->price) }}
                    <button type="submit">Add to Cart</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection