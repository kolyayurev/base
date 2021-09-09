@extends('layouts.app')

@can('edit', $page)
    @php
        Voyager::addControlButton(['icon'=>'edit','title'=>__('voyager::generic.modify'), 'url'=> route('voyager.pages.edit',['id'=>$page->id]),'class'=>'-edit']);
    @endphp
@endcan
