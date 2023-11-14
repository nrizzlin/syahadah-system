@extends('master')
@section('content')
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Attendances') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="w-full">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                                {{ __('Clock-in/Clock-out') }}</h2>

                            <div class="time">
                                <span class="hms"></span>
                                <span class="ampm"></span>
                                <br>
                                <span class="date"></span>
                            </div>

                            <div class="flex justify-center ">
                                <div class="inline-flex items-center">
                                    <div class="table">
                                        <div class="table-row-group">
                                            <div class="table-row">
                                                <form action="{{ route('clock-in') }}" method="post">
                                                    @csrf
                                                    <div class="flow-root px-4 py-2">
                                                        <label>
                                                            <input class="rounded" type="checkbox" name="tasks[]" value="Create Daily Journal">
                                                            Create Daily Journal
                                                        </label>
                                                        <br>            
                                                        <label>
                                                            <input  class="rounded" type="checkbox" name="tasks[]" value="Meeting with Mentor">
                                                            Meeting with Mentor 
                                                        </label>
                                                        <br>
                                                        <label>
                                                            <input  class="rounded" type="checkbox" name="tasks[]" value="Do the Quiz"> 
                                                            Do the Quiz
                                                        </label>
                                                        <label>
                                                            <input  class="rounded" type="checkbox" name="tasks[]" value="practice solat"> 
                                                            practice solat
                                                        </label>
                                                        <label>
                                                            <input  class="rounded" type="checkbox" name="tasks[]" value="practice zikir"> 
                                                            practice zikir
                                                        </label>
                                                    </div>
                                                    <x-button-green>{{ __('Clock In') }}</x-button-view>
                                                </form>
                                            </div>
                                            <div class="table-row">
                                                <form action="{{ route('clock-out') }}" method="post">
                                                    @csrf
                                                    <x-danger-button>{{ __('Clock Out') }}</x-button-delete>
                                                </form>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endsection
