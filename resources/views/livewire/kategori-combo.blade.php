<div>
	<div class="row">
		<div class="col-lg-4 col-xl-4">
			<div class="form-group" wire:ignore>
				<label for="">Jenis Transaksi : </label>
				<select wire:model="jenis" name="type" id="type" class="form-control @error('type') is-invalid @enderror" style="width: 100% !important; " data-placeholder="Pilih Jenis Transaksi" autofocus required>
					<option value="">- Pilih Jenis Transaksi -</option>
					<option value="1">Pemasukan</option>
					<option value="0" >Pengeluaran</option>
				</select>
				<div class="invalid-feedback">
					{{ $errors->first('type') }}
				</div>
			</div>
		</div> 
		<div class="col-lg-4 col-xl-4">
			<div class="form-group @error('category_id') has-error @enderror" wire:ignore>
				<label for="">Kategori : </label>
				<select wire:model="catid" name="category_id" id="category_id" class="form-control" style="width: 100% !important; " data-placeholder=" - Pilih Kategori Transaksi - " required>
					<option value=""></option> 
					@foreach ($kategori as $item)
						<option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
					@endforeach
				</select>
				<div class="text-danger" style="width: 100%; margin-top: .25rem; font-size: 80%;">
					{{ $errors->first('category_id') }}
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xl-4">
			<div class="form-group" wire:ignore>
				<label for="">Nominal : </label>
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Rp. </span>
					</div>
					<input wire:model="nominal" type="number" name="nominal" id="nominal" pattern="\d" class="form-control @error('nominal') is-invalid @enderror" placeholder="Masukan Nominal..." value="{{ old('nominal') }}" required>
				</div>
				<div class="invalid-feedback">
					{{ $errors->first('nominal') }}
				</div>
			</div>
		</div>
	</div> 
</div>

@push('script')
<script>
	$(document).ready(function () {
		$('#category_id').select2();

		var edit = "{{ $edit }}";
		console.log(edit);
		if (edit == "") {
			var oldType = "{{ old('type') }}";
			@this.set('jenis', oldType);

			$('#category_id').prop("disabled", true);
		}


		$('#category_id').on('change', function(e) {
			var cat_id = $('#category_id').select2("val");
			@this.set('catid', cat_id);
		});

		Livewire.on('disabling', () => {
			$('#category_id').val('').trigger('change');
			$('#category_id').empty();
			$('#category_id').append('<option value=""></option>');
			$('#category_id').prop("disabled", true);

		});

		Livewire.on('enabling', data => {
			$('#category_id').select2({
				data: data,
			})
			$('#category_id').change();

			setTimeout(() => {
				$('#category_id').prop("disabled", false);
			}, 200);
		});

	});
</script>
@endpush
