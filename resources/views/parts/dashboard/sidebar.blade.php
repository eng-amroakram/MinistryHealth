<div class="sidebar" style="background:linear-gradient(0deg, #0098f0 0%, #009b7d 100%);">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
      -->
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
                <i class="tim-icons icon-bullet-list-67"></i>
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal" style="font-size: 1.2rem;">
                قائمة التحكم
            </a>
        </div>
        <ul class="nav">
            <li>
                <a href="{{ route('panel.home') }}" style="font-size: 1rem;">
                    <i class="tim-icons icon-app"></i>
                    <p style="font-weight: bold;">الرئيسية</p>
                </a>
            </li>

            <li>
                <a href="{{ route('panel.employees') }}" style="font-size: 1rem;">
                    <i class="tim-icons icon-single-02"></i>
                    <p style="font-weight: bold;">الموظفين</p>
                </a>
            </li>
        </ul>
    </div>

</div>
