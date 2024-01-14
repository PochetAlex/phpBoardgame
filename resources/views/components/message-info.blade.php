<div class="alert bg-yellow-200 border border-yellow-400 text-yellow-800 p-4 rounded-md mb-4">
    <h3 class="font-bold">{{$titre ?? 'A votre attention'}}</h3>
    <p>{{$message}}</p>
    <div class="mt-2">
        {{$slot}}
    </div>
</div>
