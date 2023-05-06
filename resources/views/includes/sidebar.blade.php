<div class="aside">
    <div class="side-menu">
        <ul class="side-menu-list">
            <li class="side-menu-item">
                <x-feathericon-home style="height:20px"/>
                <a href="{{ route('index') }}">Dashboard</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-layers style="height:20px"/>
                <a href="#">Servicios</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-file style="height:20px"/>
                <a href="#">Reportes</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-calendar style="height:20px"/>
                <a href="{{ route('agenda') }}">Agenda</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-layers style="height:20px"/>
                <a href="{{ route('service') }}">Servicios</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-file style="height:20px"/>
                <a href="#">Reportes</a>
            </li>
            <li class="side-menu-item">
                <x-feathericon-settings style="height:20px"/>
                <a href="{{ route('config') }}">Configuración</a>
            </li>            
        </ul>
    </div>
</div>