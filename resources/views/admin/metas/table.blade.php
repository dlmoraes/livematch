    @foreach($dados as $dado)
        <tr id="linha-{{ $dado->id }}">
            <td>{{ $dado->id }}</td>
            <td name="{{ $dado->ano_id }}">{{ $dado->ano->ano }}</td>
            <td name="{{ $dado->mes_id }}">{{ $dado->mes->mes_texto }}</td>
            <td class="text-center">
                <a class="btnEdit" id="{{ $dado->id }}"
                   style="margin-right: 5px;" href="#" data-popup="tooltip" title="Alterar"><i
                            class="icon-pencil"></i> </a>
                <a name="{{ $dado->id }}" class="text-danger-700 btnDelete" href="#" data-popup="tooltip"
                   title="Remover"><i class="icon-trash"></i></a>
            </td>
        </tr>
    @endforeach
