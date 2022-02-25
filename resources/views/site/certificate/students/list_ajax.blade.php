@foreach($students as $key=>$item)
    @include('site.partials.student', ['student'=>$item])
@endforeach
