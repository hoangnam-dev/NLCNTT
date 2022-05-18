<div class="prd-specification">
    <h2 class="prd_info-title title-font">Thông số kỹ thuật</h2>
    <div class="prd-specification_body">
        <table class="prd-specification_body-tb">
            <tbody>
                @foreach ($attributes as $attribute)
                <tr>
                    <td class="prd-tb_td">{{ $attribute->tentt }}</td>
                    <td class="prd-tb_td">{{ $attribute->giatritt }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>