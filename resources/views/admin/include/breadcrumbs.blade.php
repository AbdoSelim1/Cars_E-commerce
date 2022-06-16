 {{-- resources/views/partials/breadcrumbs.blade.php --}}

 @unless ($breadcrumbs->isEmpty())
 <ol class="breadcrumb" style="user-select: none">
     @foreach ($breadcrumbs as $breadcrumb)

         @if (!is_null($breadcrumb->url) && !$loop->last)
             <li class="breadcrumb-item text-success"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
         @else
             <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
         @endif

     @endforeach
 </ol>
@endunless