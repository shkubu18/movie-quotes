<x-layout>
    <div class="flex justify-center items-center min-h-screen">
        <div class="flex flex-col items-center rounded p-10 w-2/5">
            @foreach($quotes as $quote)
                <div class="flex justify-between bg-slate-200 rounded p-4 w-full {{ !$loop->first ? ' mt-3' : '' }}">
                    <a class="mr-5" href="/quotes/{{ $quote->slug}}">{{ $quote->name }}</a>
                    <div class="flex">
                        <a class="mr-5" href="/admin/quotes/{{ $quote->id }}/edit">Edit</a>
                        <form action="/admin/quotes/{{ $quote->id }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button class="text-xs text-gray-400">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
