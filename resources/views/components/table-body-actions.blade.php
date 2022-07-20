<div>
    <td>
        @if($show)
            <button 
                wire:click="showModal({{ $objectId }})"
                class="bg-primary text-white rounded-lg border-0"
            >
                <i class="fas fa-eye text-2xl" data-toggle="tooltip" title="Anzeigen"></i>
            </button>
        @endif
        @if($edit)
            <button 
                wire:click="editModal({{ $objectId }})"
                data-toggle="tooltip"
                title="Bearbeiten"
                class="bg-primary text-white rounded-lg border-0"
            >
                <i class="fas fa-pen-to-square text-2xl"></i>
            </button>
        @endif
        @if($delete)
            <button 
                wire:click="deleteModal({{ $objectId }})"
                title="Löschen"
                data-toggle="tooltip"
                class="bg-primary text-white rounded-lg border-0"
            >
                <i class="fas fa-trash-can text-2xl"></i>
            </button>
        @endif
    </td> 
</div>