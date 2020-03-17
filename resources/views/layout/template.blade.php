@if( request()->ajax() )
    @yield("contenu")

    @else
    @include("layout.fulltemplate")
@endif

