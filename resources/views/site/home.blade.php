@extends('site/layout')

@section('title', 'Home')

@section('conteudo')
    {{-- Comentario --}}
    {{-- isset($name) ? "Existe" : "Não existe" --}}
    {{$teste ?? "Padrão"}}
    {{-- Estruturas de controle --}}
    
    @if($name == "Joao Marcos")
        TRUE
    @else 
        FALSE
    @endif
    <hr/>
    @unless($years_old > 18)
        MENOR DE IDADE
    @else 
        MAIOR DE IDADE
    @endunless
    <hr/>
    @switch($years_old)
        @case(20)
            TEM 20 ANOS
            @break
        @default
            NÃO TEM 20 ANOS
    @endswitch
    <hr/>
    
    @isset($name)
        EXISTE NOME
    @endisset
    
    <hr/>
    
    @empty($name)
        NOME ESTA VAZIO
    @endempty
    
    <hr/>
    
    @auth
        Esta autenticado
    @endauth
    @guest
        NÃO ESTA AUTENTICADO
    @endguest
    <hr/>
    {{-- Estrutura de repetição --}}
    
    @for($i = 0; $i <= 10; $i++)
        Valor atual é {{$i}}<br>
    @endfor
    <hr>
    @php
    $i = 0;
    @endphp
    @while($i <= 10)
        Valor atual com while é {{$i}}<br>
        @php
            $i++;
        @endphp
    @endwhile
    <hr>
    
    @foreach($fruits as $fruit)
        {{$fruit}} <br>
    @endforeach
    <hr>
    @forelse($fruits as $fruit){{-- Para mostra um valor padrão se não tiver nada no array --}}
        {{$fruit}} <br>
        
    @empty
        Array Vazio
    @endforelse
    <hr>
    
    @include('includes/message', ['title' => 'Mensagem de sucesso!'])
    <hr>
    
    @component('components/sidebar')
        @slot('paragrafo')
            Texto qualquer do home slot
        @endslot
    @endcomponent
@endsection