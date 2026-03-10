<div class="px-5 py-5 mt-4 border border-slate-950 w-fit">
    <button wire:click="incrementAnomaly">
        <span wire:loading.remove>
            Anomalias: {{ $anomalies }}
        </span>

        <span wire:loading>
            Loading...
        </span>
    </button>
</div>