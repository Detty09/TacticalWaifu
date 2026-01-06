<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $character->name }} - Character Sheet</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }
        h1 {
            text-align: center;
            color: #d946ef;
        }
        .section {
            margin-bottom: 12px;
        }
        .label {
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 6px;
            border-bottom: 1px solid #ccc;
        }
        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>
<body>

<h1>{{ $character->name }}</h1>

<div class="section">
    <table>
        <tr><td class="label">UUID</td><td>{{ $character->uuid }}</td></tr>
        <tr><td class="label">Dere Type</td><td>{{ $character->dereType->name }}</td></tr>
        <tr>
            <td class="label">Hair Color</td>
            <td>
        <span
            style="
                display:inline-block;
                width:12px;
                height:12px;
                border-radius:50%;
                border:1px solid #000;
                background-color: {{ $character->hair_color_hex }};
                vertical-align: middle;
                margin-right: 6px;
            ">
        </span>
                {{ $character->hair_color_hex }}
            </td>
        </tr>

        <tr>
            <td class="label">Eye Color</td>
            <td>
        <span
            style="
                display:inline-block;
                width:12px;
                height:12px;
                border-radius:50%;
                border:1px solid #000;
                background-color: {{ $character->eye_color_hex }};
                vertical-align: middle;
                margin-right: 6px;
            ">
        </span>
                {{ $character->eye_color_hex }}
            </td>
        </tr>

        <tr><td class="label">Height</td><td>{{ $character->height_cm }} cm</td></tr>
        <tr><td class="label">Number</td><td>{{ $character->number }}</td></tr>
    </table>
</div>

<div class="section">
    <p><span class="label">Player Goal:</span> {{ $character->player_goal }}</p>
    <p><span class="label">Character Goal:</span> {{ $character->characterGoal->description }}</p>
</div>

<div class="section">
    <p class="label">Weapons:</p>
    @if($character->weapons->count())
        <ul>
            @foreach($character->weapons as $weapon)
                <li>{{ $weapon->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No weapons assigned.</p>
    @endif
</div>

<div class="section">
    <p class="label">Items:</p>
    @if($character->items->count())
        <ul>
            @foreach($character->items as $item)
                <li>{{ $item->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No items assigned.</p>
    @endif
</div>

</body>
</html>
