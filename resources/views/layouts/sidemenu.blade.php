<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                @foreach (getMainMenus() as $data)
                    @php
                        $active_menu_parent  = 'submenu';
                        $has_child           = false;

                        if (sizeof($data->SubMenu) > 0){
                            $has_child = true;
                            foreach ($data->Submenu as $item){
                                //Active menu Child
                                if (Request::segment(1) == $item->link) {
                                    $active_menu_parent  = 'submenu active';
                                }
                            }
                            }else{
                                $has_child = false;
                                if (Request::segment(1) == $data->link) {
                                    $active_menu_parent  = 'submenu active';
                                }
                            }
                    @endphp
                    @if ($has_child)
                        <li class="{{$active_menu_parent }}">
                            <a href="{{ $data->link }}"><i class="{{ $data->icon }}"></i> 
                                <span>{{ $data->title }}</span> <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                @foreach ($data->SubMenu as $item)
                                    @php
                                        $sub_active = "/".Request::segment(1) == $item->link ? "active" : "";
                                    @endphp
                                    <li><a href="{{ $item->link }}" class="{{ $sub_active }}"> {{ $item->title }} </a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                    <li>
                        <a href="{{ $data->link }}"><i class="{{ $data->icon }}"></i> <span>{{ $data->title }}</span></a>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>