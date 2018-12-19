@extends('layouts.app')

@section('content')
<botman-tinker api-endpoint="/botman" headshot="{{ $headshotUrl }}" chatbot-headshot="{{ $chatbotheadshotUrl }}"></botman-tinker>
@endsection
