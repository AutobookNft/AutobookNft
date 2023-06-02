<x-collections.layout-item
    :team="$team"
    :items="$items"
    :description="$item['description']"
    :datecreation="$item['creation_date']"
    :webp="$item['webp']"
    :extention="$item['extention']"
    :thumbnails="$item['thumbnail']"
    :title="$item['title']"
    :itemId="$item['id']"
    :show="$item['show']"
    paired="{{ $paired }}"
    fileCover="{{ $fileCover }}"
    filename="{{ $filename }}"
    price="{{ $item['price'] }}"
    hasHfile="{{ $item['hash_file'] }}"
    imagetitle="{{ $imagetitle }}"
    editShow='edit'
    dontShow="{{ $dontShow }}"
    saved="{{ $saved }}"
    :cardType="$cardType"
    itemType="{{ $teamItem->type  }}"
    :collectionname="$collectionname"/>





