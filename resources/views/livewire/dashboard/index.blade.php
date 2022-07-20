<div>
    <x-table title="Telefonbuch Einträge" tableHeadings="Vorname, Nachname, Telefonnummer" createModal="#create">
        @foreach ($entries as $entry)
            <x-table-row>
                <x-table-body-id id="{{ $entry->id }}" />
                <x-table-body-attribute value="{{ $entry->first_name }}" />
                <x-table-body-attribute value="{{ $entry->last_name }}" />
                <x-table-body-attribute value="{{ $entry->number }}" />
                <x-table-body-actions objectId="{{ $entry->id }}" />
            </x-table-row>
        @endforeach
    </x-table>


    
    <x-modal title="Neuen Eintrag anlegen" function="create()" modalId="create">
        <x-input-field.text-row title="Vorname" attribute="first_name" placeholder="Vornamen eingeben" model="entry.first_name"/>
        <x-input-field.text-row title="Nachname" attribute="last_name" placeholder="Nachnamen eingeben" model="entry.last_name"/>
        <x-input-field.text-row title="Nummer" attribute="number" placeholder="Nummer eingeben" model="entry.number"/>
    </x-modal>
</div>

