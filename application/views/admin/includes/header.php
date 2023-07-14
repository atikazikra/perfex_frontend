<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>



<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand mt-2">
<!-- toggle +icon -->
        <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon">
              <span class="toggle-line"></span>
              </span>
        </button>
            <a class="navbar-brand me-1 me-sm-3" href="/">
              <div class="d-flex align-items-center"><img class="me-2" src="<?= base_url('assets/falcon/img/zikraicon.png')?>" alt="" width="40" />
                <span class="font-sans-serif"></span>
              </div>
            </a>
           <!-- toggle +icon end -->
           <ul class="navbar-nav align-items-center d-none d-lg-block ">
            <!--search work-->
              <li class="nav-item">
                <div class="search-box" data-list='{"valueNames":["title"]}'>
                  <div class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input id="search_input" class="form-control search-input fuzzy-search" type="search" placeholder="<?php echo _l('top_search_placeholder'); ?>"" aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                </div>
                  <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                    <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
                  </div>
                  <div id="" class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                    <div class="scrollbar list py-3" style="max-height: 24rem;">
                      <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs--2 pt-0 pb-2">Recently Browsed</h6>
                    </div>
                    <div  class="text-center mt-n3">
                    <div id="search_results">
                    </div>
                    <ul class="dropdown-menu " id="search-history">
                    </ul>
                    </div>
                    <hr class="text-200 dark__text-900"/>
                  </div>
                </div>         
              </li>
                          <!--search work end-->

              <?php
                    $quickActions = collect($this->app->get_quick_actions_links())->reject(function ($action) {
                        return isset($action['permission']) && !has_permission($action['permission'], '', 'create');
                    });
                ?>
                    <?php if ($quickActions->isNotEmpty()) { ?>
                        <li class="nav-item display-4 ms-2 mt-2 position-relative"
 title="<?php echo _l('quick_create'); ?>"
                        data-toggle="tooltip" data-placement="bottom">
                        <a href="#" class="!tw-px-0 tw-group text-white" data-toggle="dropdown">
                        <span class="rounded-circle d-flex align-items-center justify-content-center" style="height: 2.5rem; width: 2.5rem;">
                            <i class="fas fa-plus-circle text-info"></i>
                        </span>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-right animated fadeIn tw-text-base">
                            <li class="dropdown-header tw-mb-1">
                                <?php echo _l('quick_create'); ?>
                            </li>
                            <?php foreach ($quickActions as $key => $item) {
                    $url = '';
                    if (isset($item['permission'])) {
                        if (!has_permission($item['permission'], '', 'create')) {
                            continue;
                        }
                    }
                    if (isset($item['custom_url'])) {
                        $url = $item['url'];
                    } else {
                        $url = admin_url('' . $item['url']);
                    }
                    $href_attributes = '';
                    if (isset($item['href_attributes'])) {
                        foreach ($item['href_attributes'] as $key => $val) {
                            $href_attributes .= $key . '=' . '"' . $val . '"';
                        }
                    } ?>
                            <li>
                                <a href="<?php echo $url; ?>" <?php echo $href_attributes; ?>
                                    class="tw-group tw-inline-flex tw-space-x-0.5 tw-text-neutral-700">
                                    <?php if (isset($item['icon'])) { ?>
                                    <i
                                        class="<?php echo $item['icon']; ?> tw-text-neutral-400 group-hover:tw-text-neutral-600 tw-h-5 tw-w-5"></i>
                                    <?php } ?>
                                    <span>
                                        <?php echo $item['name']; ?>
                                    </span>
                                </a>
                            </li>
                            <?php
                } ?>
                        </ul>
                    </li>
                    <?php } ?>
            </ul>
            
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">

            <li class="nav-item px-2">
                <div class="theme-control-toggle fa-icon-wait">
                  <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                  <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                </div>
              </li>

              <?php do_action_deprecated('after_render_top_search', [], '3.0.0', 'admin_navbar_start'); ?>
                <?php hooks()->do_action('admin_navbar_start'); ?>
                <?php if (is_staff_member()) { ?>
                <li class="icon header-newsfeed nav-item px-2">
                    <a href="#" class="open_newsfeed desktop" data-toggle="tooltip"
                        title="<?php echo _l('whats_on_your_mind'); ?>" data-placement="bottom">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="tw-w-5 tw-h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                        </svg>
                    </a>
                </li>
                <?php } ?>

                
                <li class="icon header-todo nav-item px-2 ">
                    <a href="<?php echo admin_url('todo'); ?>" data-toggle="tooltip"
                        title="<?php echo _l('nav_todo_items'); ?>" data-placement="bottom" class="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="tw-w-5 tw-h-5 tw-shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>

                        <span
                            class="tw-leading-none tw-px-1 tw-py-0.5 tw-text-xs bg-warning tw-z-10 tw-absolute tw-rounded-full tw-right-1 tw-top-2.5 tw-min-w-[18px] tw-min-h-[18px] tw-inline-flex tw-items-center tw-justify-center nav-total-todos<?php echo $current_user->total_unfinished_todos == 0 ? ' hide' : ''; ?>">
                            <?php echo $current_user->total_unfinished_todos; ?>
                        </span>
                    </a>
                </li>

                <li class="nav-item px-2 icon header-timers timer-button tw-relative ltr:tw-mr-1.5 rtl:tw-ml-1.5"
                    data-placement="bottom" data-toggle="tooltip" data-title="<?php echo _l('my_timesheets'); ?>">
                    <a href="#" id="top-timers" class="top-timers !tw-px-0 tw-group" data-toggle="dropdown">
                        <span
                            class="tw-rounded-md tw-border tw-border-solid tw-border-neutral-200/60 tw-inline-flex tw-items-center tw-justify-center tw-h-8 tw-w-9 -tw-mt-1.5 group-hover:!tw-bg-neutral-100/60">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor"
                                class="tw-w-5 tw-h-5 tw-text-neutral-900 tw-shrink-0<?php echo  count($startedTimers) > 0 ? ' tw-animate-spin-slow' : ''; ?>">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <span
                            class="tw-leading-none tw-px-1 tw-py-0.5 tw-text-xs bg-success tw-z-10 tw-absolute tw-rounded-full -tw-right-1.5 tw-top-2 tw-min-w-[18px] tw-min-h-[18px] tw-inline-flex tw-items-center tw-justify-center icon-started-timers<?php echo $totalTimers = count($startedTimers) == 0 ? ' hide' : ''; ?>">
                            <?php echo count($startedTimers); ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeIn started-timers-top width300" id="started-timers-top">
                        <?php $this->load->view('admin/tasks/started_timers', ['startedTimers' => $startedTimers]); ?>
                    </ul>
                </li>
                    
            </ul>

         
          </nav>