@extends('template')
@section('main_container')
        
                @if(session('status'))
                    <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button>
                    
                    </div>

                @endif
                <div class="title">Welcome @if(Auth::check())
                        hi there.........
                @endif
                        </div>
                        @if(isset($email))
                        <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                       <span class="glyphicon glyphicon-ok"></span> <strong>Success Message</strong>
                        <hr class="message-inner-separator">
                        <p>
                            You successfully login {{ $email }}.</p>
                        </div>
                        @endif
                    {{-- <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <span class="glyphicon glyphicon-info-sign"></span> <strong>Info Message</strong>
                        <hr class="message-inner-separator">
                        <p>
                            This alert needs your attention, but it's not super important.</p>
                    </div>
                     <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <span class="glyphicon glyphicon-record"></span> <strong>Warning Message</strong>
                        <hr class="message-inner-separator">
                        <p>
                            Best check yo self, you're not looking too good.</p>
                    </div> --}}
                    @if(isset($alert))
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            ×</button>
                        <span class="glyphicon glyphicon-hand-right"></span> <strong>Danger Message</strong>
                        <hr class="message-inner-separator">
                        <p>
                            Change a few things up and try submitting again.</p>
                    </div>
                    @endif
@endsection