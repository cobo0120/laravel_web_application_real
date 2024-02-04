<tbody>
    <tr class="item">
        <td>
            <select class="form-control" name="consumables_equipment_id[0]" value="{{ old('') }}">
                @foreach ($consumables as $consumable)
                    <option value="{{ $consumable->id }}">{{ $consumable->consumables_equipment }}
                    </option>
                @endforeach
            </select>
        </td>
        <td>
            <input type="text" class="form-control" name="product_name[0]" value="{{ old('product_name') }}">
        </td>
        <td>
            <input type="text" class="form-control text-right" size="5" name="unit_purchase_price[0]"
                pattern="^[0-9]+$" value="{{ old('unit_purchase_price') }}">
        </td>
        <td>
            <input type="text" class="form-control text-right" size="3" name="purchase_quantities[0]"
                pattern="^[0-9]+$"required value="{{ old('purchase_quantities') }}">
        </td>
        <td>
            <input type="text" class="form-control text-right" size="3" name="units[0]">
        </td>
        <td>
            <select class="form-control" name="account_id[0]" value="{{ old('accound_id') }}">
                @foreach ($accounts as $account)
                    <option value="{{ $account->id }}">{{ $account->account }}</option>
                @endforeach
            </select>
        </td>
        <td class="clear-column close-icon">✖</td>
</tbody>
