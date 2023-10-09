<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>TOAST UI Calendar App Demo</title>
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.css" />
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.css" />
    <link rel="stylesheet" href="./styles/reset.css" />
    <link rel="stylesheet" href="./styles/app.css" />
    <link rel="stylesheet" href="./styles/icons.css" />
</head>
<body>
    <div class="app-container code-html">
        <header class="header">
            <a href="https://github.com/nhn/tui.calendar">
                <img alt="TOAST UI Calendar Brand Image" src="./images/img-bi.png" srcset="./images/img-bi@2x.png 2x, ./images/img-bi@3x.png 3x" />
            </a>
        </header>
        <article class="content">
            <aside class="sidebar">
                <div class="sidebar-item">
                    <input class="checkbox-all" type="checkbox" id="all" value="all" checked />
                    <label class="checkbox checkbox-all" for="all">View all</label>
                </div>
                <hr />
                <div class="sidebar-item">
                    <input type="checkbox" id="1" value="1" checked />
                    <label class="checkbox checkbox-calendar checkbox-1" for="1">My Calendar</label>
                </div>
                <div class="sidebar-item">
                    <input type="checkbox" id="2" value="2" checked />
                    <label class="checkbox checkbox-calendar checkbox-2" for="2">Work</label>
                </div>
                <div class="sidebar-item">
                    <input type="checkbox" id="3" value="3" checked />
                    <label class="checkbox checkbox-calendar checkbox-3" for="3">Family</label>
                </div>
                <div class="sidebar-item">
                    <input type="checkbox" id="4" value="4" checked />
                    <label class="checkbox checkbox-calendar checkbox-4" for="4">Friends</label>
                </div>
                <div class="sidebar-item">
                    <input type="checkbox" id="5" value="5" checked />
                    <label class="checkbox checkbox-calendar checkbox-5" for="5">Travel</label>
                </div>
                <hr />
                <div class="app-footer">© NHN Cloud Corp.</div>
            </aside>
            <section class="app-column">
                <nav class="navbar">
                    <div class="dropdown">
                        <div class="dropdown-trigger">
                            <button class="button is-rounded" aria-haspopup="true" aria-controls="dropdown-menu">
                                <span class="button-text"></span>
                                <span class="dropdown-icon toastui-calendar-icon toastui-calendar-ic-dropdown-arrow"></span>
                            </button>
                        </div>
                        <div class="dropdown-menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item" data-view-name="month">Monthly</a>
                                <a href="#" class="dropdown-item" data-view-name="week">Weekly</a>
                                <a href="#" class="dropdown-item" data-view-name="day">Daily</a>
                            </div>
                        </div>
                    </div>
                    <button class="button is-rounded today">Today</button>
                    <button class="button is-rounded prev">
                        <img alt="prev" src="./images/ic-arrow-line-left.png" srcset="
                  ./images/ic-arrow-line-left@2x.png 2x,
                  ./images/ic-arrow-line-left@3x.png 3x
                " />
                    </button>
                    <button class="button is-rounded next">
                        <img alt="prev" src="./images/ic-arrow-line-right.png" srcset="
                  ./images/ic-arrow-line-right@2x.png 2x,
                  ./images/ic-arrow- line-right@3x.png 3x
                " />
                    </button>
                    <span class="navbar--range"></span>
                    <div class="nav-checkbox">
                        <input class="checkbox-collapse" type="checkbox" id="collapse" value="collapse" />
                        <label for="collapse">Collapse duplicate events and disable the detail popup</label>
                    </div>
                </nav>
                <main id="app">
                    <div id="calendar" style="height: 600px;">
                </main>
            </section>
        </article>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.1.8/chance.min.js"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>
    <script src="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.js"></script>
    <!-- CDN -->
    <link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css" />
    <script src="./scripts/mock-data.js?v=<?= rand(100000, 99999) ?>"></script>
    <script src="./scripts/utils.js?v=<?= rand(100000, 99999) ?>"></script>
    <script src="./scripts/app.js?v=<?= rand(100000, 99999) ?>"></script>
</body>
</html>