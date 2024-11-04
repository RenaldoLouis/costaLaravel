<div>
    <select class="form-control" id="province" name="province">
        <option value="">Select Province</option>
        @foreach ($provinces as $id => $province)
            <option value="{{ $id }}">{{ $province }}</option>
        @endforeach
    </select>
</div>
