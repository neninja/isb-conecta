<x-app-layout>
    <x-slot:title>{{user()->name}}</x-slot>
    <x-slot:subtitle>{{user()->currentTeam->name}}</x-slot>
</x-app-layout>
