<div class="aside shadow">
    <div class="side-menu">
        <ul class="side-menu-list">
            <li class="side-menu-item">
                <x-feathericon-home style="height:20px"/>
                <a href="{{ route('index') }}">Dashboard</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-user style="height:20px"/>
                <a href="{{ route('clients') }}">Clientes</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-layers style="height:20px"/>
                <a href="{{ route('service') }}">Servicios</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-file style="height:20px"/>
                <a href="{{ route('reports') }}">Reportes</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-calendar style="height:20px"/>
                <a href="{{ route('calendar') }}">Calendario</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-settings style="height:20px"/>
                <a href="{{ route('config') }}">Configuración</a>
            </li>            
        </ul>
    </div>
</div>