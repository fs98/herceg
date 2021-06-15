<div class="form-group">
  <label for="inputCategory">Category name</label>
  <input type="text" class="form-control @error('body') is-invalid @enderror" value="{{ old('inputCategory', $category->category) }}" id="inputCategory" name="category" aria-describedby="categoryHelp" placeholder="Enter name">
  <small id="categoryHelp" class="form-text text-muted">Please make sure your category name is not longer than 200 characters.</small>
  @error('category')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
  @enderror
</div> 