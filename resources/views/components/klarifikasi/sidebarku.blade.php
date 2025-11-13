<div class="sidebar-content">
    <ul class="nav nav-secondary">
        @foreach ($links as $link)
            @if ($link['is_dropdown'])
                <li class="nav-item {{ $link['is_active'] ? active : '' }}">
                    <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                        <i class="{{ $link['icon'] }}"></i>
                        <p>{{ $link['name'] }}</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="../demo1/index.html">
                                    <span class="sub-item">Dashboard 1</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @else
                <li class="nav-item {{ $link['is_active'] ? active : '' }}">
                    <a href="widgets.html">
                        <i class="{{ $link['icon'] }}"></i>
                        <p>{{ $link['name'] }}</p>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
