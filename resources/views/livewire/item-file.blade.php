<x-collections.layout-item
    :thumbnails="$item['description']"
    title="{{ $item['title'] }}"
    itemId="{{ $item['id'] }}"
    imagefile="{{ $item['hash_file'] }}"
    imagetitle="{{ $imagetitle }}"
    :itemType="$itemType"
    fileCover="{{ $item['hash_file'] }}"
    :itemIdBeingRemoved="$itemIdBeingRemoved"
    cardType="{{ $cardType }}"/>


  

