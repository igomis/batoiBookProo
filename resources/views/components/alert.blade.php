<div class="bg-{{ $level }}-100 border-l-4 border-{{ $level }}-500 text-{{ $level }}-700 p-4" role="alert">
    <p class="font-bold">Atention: {{ $message }}
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';" aria-label="Close">
            <span class="text-{{ $level }}-500">&times;</span>
        </button>
    </p>
</div>
