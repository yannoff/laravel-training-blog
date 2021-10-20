@extends('layouts.admin')

@toto

@email('email', 'toto@example.fr', ['required' => 'required'])
@text('title', 'Le texte de toto', ['readonly' => 'readonly'])
@textarea('contents', 'Lorem ipsum des choses <i>etc, etc</i>')
