<form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
  onsubmit="return confirm('Sei sicuro di voler eliminare {{ $project->title }}?')" class="d-inline-block">
  @csrf
  @method('DELETE')

  <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
</form>
