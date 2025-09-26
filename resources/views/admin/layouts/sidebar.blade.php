<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu" class="pt-4">
            @php
                $user = Auth::guard('admin')->user();
            @endphp

            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title bg-center" data-key="t-menu">Menu</li>

                {{-- Dashboard --}}
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                {{-- Masters --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <i data-feather="layers"></i>
                        <span data-key="t-masters">Masters</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.ledgerMaster.index') }}">
                                <i data-feather="package"></i>
                                <span data-key="t-ledger-master">Vendors</span>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Purchases --}}
                <li>
                    <a href="javascript:void(0);" class="has-arrow">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-purchases">Purchases</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.purchase.index') }}">
                                <i data-feather="package"></i>
                                <span data-key="t-raw-material">Raw Material</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.bags.index') }}">
                                <i data-feather="package"></i>
                                <span data-key="t-bags">Bags</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- sale -->
                 <li>
                    <a href="{{ route('admin.sale.index') }}">
                        <i class="fas fa-layer-group"></i>
                        <span data-key="t-purchases">Sales</span>
                    </a>
                </li>
                 <li>
                    <a href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users"></i>
                        <span data-key="t-purchases">Users</span>
                    </a>
                </li>


                {{-- Dynamic Modules --}}
                <li>
                    <a href="{{ route('admin.dynamicmodules.index') }}">
                        <i data-feather="shopping-cart"></i>
                        <span data-key="t-modules">Modules</span>
                    </a>
                </li>

                {{-- Module Records --}}
                @foreach(\App\Models\Module::all() as $module)
                    <li>
                        <a href="{{ route('admin.modules.records.index', $module->id) }}">
                            <i class="fas fa-layer-group"></i>
                            <span>{{ $module->name }}</span>
                        </a>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
</div>
