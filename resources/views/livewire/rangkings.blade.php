<div>
    <div class="overflow-x-auto">
        <table class="table w-full">
          <thead>
            <tr>
              <th>Rank</th>
              <th>Project Name</th>
              <th>Alternative Name</th>
              <th>Result Value</th>
            </tr>
          </thead>
          <tbody>
              @forelse ($rangkings  as $rangking)
              <tr>
                <th>{{ $rangking->rank }}</th>
                <td>{{ $project->name }}</td>
                <td>{{ $rangking->alternative->name }}</td>
                <td>{{ $rangking->result }}</td>
              </tr>
              @empty
                Not Calculated Yet
              @endforelse
          </tbody>
        </table>
      </div>

</div>
