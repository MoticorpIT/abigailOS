<tr class="status-{{ $asset->status_id }}">
    <td class="name all">
        <span class="name">{{ $asset->name }}</span>
    </td>
    <td class="id none">
        {{ $asset->id }}
    </td>
    <td class="contact">
        <div class="btn-group contact-button">
            <a href="tel:{{ clickablePhone($asset->phone_1) }}" class="btn btn-secondary">
                <span><i class="fas fa-phone"></i> {{ cleanPhone($asset->phone_1) }}</span>
            </a>
            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                @if($asset->phone_2)
                <a class="dropdown-item" href="tel:{{ clickablePhone($asset->phone_2) }}">
                    <span><i class="fas fa-phone"></i> {{ cleanPhone($asset->phone_2) }}</span>
                </a>
                @endif
                @if($asset->fax)
                <a class="dropdown-item">
                    <span><i class="fas fa-fax"></i> {{ cleanPhone($asset->fax) }}</span>
                </a>
                @endif
                @if($asset->email)
                <a class="dropdown-item" href="mailto:{{ $asset->email }}">
                    <span><i class="fas fa-at"></i> {{ $asset->email }}</span>
                </a>
                @endif
            </div>
        </div> <!-- btn group -->
    </td>
    <td class="street-address">
        <div>
            <span class="item">{{ $asset->street_1 }}</span>
            <span class="item">{{ $asset->street_2 }}</span>
        </div>
        <div>
            {{ $asset->city }}, {{ $asset->state }} {{ $asset->zip }}
        </div>
    </td>
    <td class="type">
        {{ $asset->assetType->name }}
    </td>
    <td class="company">
        {{ $asset->company->name }}
    </td>
    <td class="rent">
        {{ $asset->rent != null ? '$' : 'n/a' }}{{ $asset->rent }}
    </td>
    <td class="deposit">
        {{ $asset->deposit != null ? '$' : 'n/a' }}{{ $asset->deposit }}
    </td>
    <td class="created-on none">
        <span class="date">
            {{ cleanDate($asset->created_at) }}
        </span>
    </td>
    <td class="updated-on none">
        @if($asset->updated_at != null)
        <span class="date">
            {{ cleanDate($asset->updated_at) }}
        </span>
        <span class="date-readable">
            {{ $asset->updated_at->diffForHumans() }}
        </span>
        @else
        <span class="date">
            NA
        </span>
        @endif
    </td>
    <td class="view-button not-mobile-p">
        <a href="{{ route('assets.show', $asset) }}" class="btn btn-secondary btn-sm view-link">
            <i class="fas fa-eye"></i>
        </a>
        <a href="{{ route('assets.edit', $asset) }}" class="btn btn-secondary btn-sm view-link">
            <i class="fas fa-pencil-alt"></i>
        </a>
    </td>
</tr>
