<div class="modal card-modal show" style="padding-right: 17px;" id="classModal" tabindex="-1" role="dialog"
aria-hidden="true">
    <div class="modal-dialog" id="cardModalContainer">
        <div class="modal-content" id="cardModalContent">
            <div id="cardModalTabMenu">
                <ul class="nav nav-tabs" role="tablist">
                    <!--home-->
                    <li class="nav-item"> <a class="nav-link active ajax-request" data-toggle="tab"
                            href="javascript:void(0);" role="tab"
                            data-url="https://midnight.growcrm.io/tasks/content/103/show-main?show=tab"
                            data-loading-class="loading-before-centre" data-loading-target="card-tasks-left-panel"><span
                                class="hidden-sm-up"><i class="ti-home"></i></span> <span
                                class="hidden-xs-down">Task</span></a> </li>
                </ul>
            </div>
            <div class="modal-body row min-h-200" id="cardModalBody">
                <!--close button-->
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="ti-close"></i>
                </button>
                <!--left panel-->
                <div class="col-sm-12 col-lg-8 card-left-panel" id="card-left-panel">
                    <!--title-->
                    <div class="card-title m-b-0">
                        <span id="card-title-editable"> Back label design
                        </span>
                    </div>
                    <!--buttons: edit-->
                    <div class=""><small><strong>Project: </strong></small><small id="card-task-milestone-title"><a
                                href="https://midnight.growcrm.io/projects/48">Fruit juice bottle label
                                design</a></small></div>
                    <div class="m-b-15"><small><strong>Milestone: </strong></small><small
                            id="card-task-milestone-title">Design</small></div>

                    <!--[dependency][lock-1] start-->
                    <!--description-->
                    <div class="card-description" id="card-description">
                        <div class="x-heading"><i class="mdi mdi-file-document-box"></i>Description</div>
                        <div class="x-content rich-text-formatting" id="card-description-container">
                            <span style="text-decoration:underline;"><strong>Task Summary</strong></span><br>
                            <ul>
                                <li>Prepare an initial draft</li>
                                <li>It must be tested is on multiple devices</li>
                                <li>Submit both high and low fidelity versions</li>
                            </ul>
                            <br><span style="text-decoration:underline;"><strong>Task
                                    Details</strong></span><br><br>This is the initial draft and it must contain all the
                            key elements (as listed in the project brief). It should allow the client to envisage the
                            final outcome.&nbsp;<br><br>Ensure that all required checks have been done (see checklist
                            for details)
                            <hr><span style="text-decoration:underline;"><strong>Samples &amp; Ideas<br><br>
                                <img
                                        src="storage/files/vsfVTJNMYvNU1qsUXvLcp8xYEaZnAoB4hXidBVWo/img.jpg" alt=""
                                        width="405" height="310"><br><br>
                                <br></strong>
                            </span>
                        </div>
                        <!--buttons: edit-->
                        <div id="card-description-edit">
                            <div class="x-action" id="card-description-button-edit"><a href="javaScript:void(0);">Edit
                                    Description</a>
                            </div>
                            <input type="hidden" name="task_description" id="card-description-input" value="">
                        </div>
                        <!--button: subit & cancel-->
                        <div id="card-description-submit" class="p-t-10 hidden text-right">
                            <button type="button" class="btn waves-effect waves-light btn-xs btn-default"
                                id="card-description-button-cancel">Cancel</button>
                            <button type="button"
                                class="btn waves-effect waves-light btn-xs btn-danger js-description-save"
                                data-url="https://midnight.growcrm.io/tasks/103/update-description?ref=list"
                                data-progress-bar="hidden" data-type="form" data-form-id="card-description"
                                data-ajax-type="post" id="card-description-button-save">Save</button>
                        </div>
                    </div>

                    <!--checklist-->
                    <div class="card-checklist" id="card-checklist">
                        <div class="x-action">
                            <a href="javascript:void(0)" class="js-card-checklist-toggle" id="card-checklist-add-new"
                                data-action-url="https://midnight.growcrm.io/tasks/103/add-checklist?ref=list"
                                data-toggle="new">Create A New Item</a>
                        </div>
                    </div>


                    <!--attachments-->
                    <div class="card-attachments" id="card-attachments"
                        data-upload-url="https://midnight.growcrm.io/tasks/103/attach-files">
                        <div class="x-heading"><i class="mdi mdi-cloud-download"></i>File Attachments</div>
                        <div class="x-content row" id="card-attachments-container">
                            <div class="col-sm-12" id="card_attachment_dnFXj5X1Qxvs7NIc4IAn95k71ZvhzWU2G3NZUjM5">
                                <div class="file-attachment">
                                    <!--dynamic inline style-->
                                    <div class="">
                                        <a class="fancybox preview-image-thumb"
                                            href="storage/files/dnFXj5X1Qxvs7NIc4IAn95k71ZvhzWU2G3NZUjM5/back-3.jpg"
                                            title="back-3.jpg" alt="back-3.jpg">
                                            <img class="x-image"
                                                src="https://midnight.growcrm.io/storage/files/dnFXj5X1Qxvs7NIc4IAn95k71ZvhzWU2G3NZUjM5/thumb_back_3.jpg">
                                        </a>
                                    </div>
                                    <div class="x-details">
                                        <div><span class="x-meta">Steven</span>
                                            [2 years ago]</div>
                                        <div class="x-name"><span title="back-3.jpg">back-3.jpg</span>
                                        </div>
                                        <div class="x-actions"><strong>
                                                <!--action: download-->
                                                <a href="tasks/download-attachment/dnFXj5X1Qxvs7NIc4IAn95k71ZvhzWU2G3NZUjM5"
                                                    download="">Download <span class="x-icons"><i
                                                            class="ti-download"></i></span></a>
                                            </strong>
                                            <!--action: delete-->
                                            <span> |
                                                <a href="javascript:void(0)"
                                                    class="text-danger js-delete-ux-confirm confirm-action-danger"
                                                    data-confirm-title="Delete Item" data-confirm-text="Are you sure?"
                                                    data-ajax-type="DELETE"
                                                    data-parent-container="card_attachment_dnFXj5X1Qxvs7NIc4IAn95k71ZvhzWU2G3NZUjM5"
                                                    data-progress-bar="hidden"
                                                    data-url="https://midnight.growcrm.io/tasks/delete-attachment/dnFXj5X1Qxvs7NIc4IAn95k71ZvhzWU2G3NZUjM5?ref=list">Delete</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12" id="card_attachment_UnUVOO16VgIdPSO3HKyJlYZwgmMUbeb50kcUUyKQ">
                                <div class="file-attachment">
                                    <!--dynamic inline style-->
                                    <div class="">
                                        <a class="fancybox preview-image-thumb"
                                            href="storage/files/UnUVOO16VgIdPSO3HKyJlYZwgmMUbeb50kcUUyKQ/back-2.jpg"
                                            title="back-2.jpg" alt="back-2.jpg">
                                            <img class="x-image"
                                                src="https://midnight.growcrm.io/storage/files/UnUVOO16VgIdPSO3HKyJlYZwgmMUbeb50kcUUyKQ/thumb_back_2.jpg">
                                        </a>
                                    </div>
                                    <div class="x-details">
                                        <div><span class="x-meta">Steven</span>
                                            [2 years ago]</div>
                                        <div class="x-name"><span title="back-2.jpg">back-2.jpg</span>
                                        </div>
                                        <div class="x-actions"><strong>
                                                <!--action: download-->
                                                <a href="tasks/download-attachment/UnUVOO16VgIdPSO3HKyJlYZwgmMUbeb50kcUUyKQ"
                                                    download="">Download <span class="x-icons"><i
                                                            class="ti-download"></i></span></a>
                                            </strong>
                                            <!--action: delete-->
                                            <span> |
                                                <a href="javascript:void(0)"
                                                    class="text-danger js-delete-ux-confirm confirm-action-danger"
                                                    data-confirm-title="Delete Item" data-confirm-text="Are you sure?"
                                                    data-ajax-type="DELETE"
                                                    data-parent-container="card_attachment_UnUVOO16VgIdPSO3HKyJlYZwgmMUbeb50kcUUyKQ"
                                                    data-progress-bar="hidden"
                                                    data-url="https://midnight.growcrm.io/tasks/delete-attachment/UnUVOO16VgIdPSO3HKyJlYZwgmMUbeb50kcUUyKQ?ref=list">Delete</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="x-action"><a class="card_fileupload" id="js-card-toggle-fileupload"
                                href="javascript:void(0)">Add a file attachment</a></div>

                        <div class="hidden" id="card-fileupload-container">
                            <div class="dropzone dz-clickable" id="card_fileupload">
                                <div class="dz-default dz-message">
                                    <i class="icon-Upload-toCloud"></i>
                                    <span>Drop files here or click to upload</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--attachemnts js-->
                    <!--comments-->
                    <div class="card-comments" id="card-comments">
                        <div class="x-heading"><i class="mdi mdi-message-text"></i>Comments</div>
                        <div class="x-content">
                            <!--complete commenting form-->
                            <div class="post-comment" id="post-card-comment-form">
                                <!--placeholder textbox-->
                                <div class="x-message-field x-message-field-placeholder m-b-10"
                                    id="card-coment-placeholder-input-container"
                                    data-show-element-container="card-comment-tinmyce-container">
                                    <textarea class="form-control form-control-sm w-100" rows="1"
                                        id="card-coment-placeholder-input">Post a comment...</textarea>
                                </div>
                                <!--rich text editor-->
                            </div>
                            <!--/#complete commenting form-->
                            <!--comments-->
                            <div id="card-comments-container"></div>
                        </div>
                    </div>
                    <!--[dependency][lock-1] end-->
                </div>
                <!--right panel-->
                {{-- <div class="col-sm-6 col-lg-4 card-right-panel" id="card-right-panel"></div> --}}
                <div class="col-sm-12 col-lg-4 card-right-panel" id="card-right-panel">
                    <!--show timer-->
                    <div id="task-timer-container">
                    </div>
                    <!----------settings----------->
                    <div class="x-section">
                        <div class="x-title">
                            <h6>Settings</h6>
                        </div>
                        <!--start date-->
                        <div class="x-element" id="task-start-date"><i class="mdi mdi-calendar-plus"></i>
                            <span>Start Date:</span>
                            <span class="x-highlight x-editable card-pickadate"
                                data-url="https://midnight.growcrm.io/tasks/103/update-start-date?ref=list"
                                data-type="form" data-progress-bar="hidden" data-form-id="task-start-date"
                                data-hidden-field="task_date_start" data-container="task-start-date-container"
                                data-ajax-type="post" id="task-start-date-container">08-09-2022</span>
                            <input type="hidden" name="task_date_start" id="task_date_start">
                        </div>
                        <!--due date-->
                        <div class="x-element" id="task-due-date"><i class="mdi mdi-calendar-clock"></i>
                            <span>Due Date:</span>
                            <span class="x-highlight x-editable card-pickadate"
                                data-url="https://midnight.growcrm.io/tasks/103/update-due-date?ref=list"
                                data-type="form" data-progress-bar="hidden" data-form-id="task-due-date"
                                data-hidden-field="task_date_due" data-container="task-due-date-container"
                                data-ajax-type="post" id="task-due-date-container">08-09-2022</span>
                            <input type="hidden" name="task_date_due" id="task_date_due">
                        </div>
                        <!--status-->
                        <div class="x-element" id="card-task-status"><i class="mdi mdi-flag"></i>
                            <span>Status: </span>
                            <span class="x-highlight x-editable js-card-settings-button-static"
                                data-container=".card-modal" id="card-task-status-text" tabindex="0"
                                data-popover-content="card-task-statuses" data-offset="0 25%" data-status-id="3"
                                data-title="Status" data-original-title="" title="">In Progress</span>
                        </div>

                        <!--priority-->
                        <div class="x-element" id="card-task-priority"><i class="mdi mdi-flag"></i>
                            <span>Priority: </span>
                            <span class="x-highlight x-editable js-card-settings-button-static"
                                data-container=".card-modal" id="card-task-priority-text" tabindex="0"
                                data-popover-content="card-task-priorities" data-offset="0 25%" data-status-id="1"
                                data-title="Priority" data-original-title="" title="">Normal</span>
                        </div>

                        <!--client visibility-->
                        <div class="x-element" id="card-task-client-visibility"><i class="mdi mdi-eye"></i>
                            <span>Client:</span>
                            <span class="x-highlight x-editable js-card-settings-button-static"
                                data-container=".card-modal" id="card-task-client-visibility-text" tabindex="0"
                                data-popover-content="card-task-visibility" data-title="Client Visibility"
                                data-original-title="" title="">Visible</span>
                            <input type="hidden" name="task_client_visibility" id="task_client_visibility">

                        </div>

                        <!--reminder-->
                        <div class="card-reminders-container" id="card-reminders-container">
                            <!--reminder-->
                            <div class="x-element x-action ajax-request x-element-info"
                                data-url="https://midnight.growcrm.io/reminders/new?ref=card&amp;resource_type=task&amp;resource_id=103&amp;reminder_ref=list"
                                data-loading-target="card-reminder-create-button" id="card-reminder-create-button"><i
                                    class="ti-alarm-clock m-t--4 p-r-6"></i>
                                <span class="x-highlight"> Add A Reminder</span>
                            </div>
                            <div class="card-reminder card-reminder-create-container reminders-side-panel hidden"
                                id="card-reminder-create-container">
                                <div class="card-reminder-create-wrapper reminders-side-panel-body"
                                    id="card-reminder-create-wrapper">
                                    <!--dynamic-->
                                </div>
                                <input name="reminder_action" id="reminder_action" type="hidden">
                            </div>
                        </div>


                    </div>

                    <!----------tags----------->
                    <div class="card-tags-container" id="card-tags-container">
                        <div class="x-section">
                            <div class="x-title">
                                <h6>Tags</h6>
                            </div>
                            <!--current tags-->
                            <div id="card-tags-current-tags-container">
                                <div class="x-edit-tabs"><a href="javascript:void(0);" id="card-tags-button-edit">Edit
                                        Tags</a>
                                </div>
                            </div>
                            <!--edit tags-->
                            <div id="card-tags-edit-tags-container" class="hidden">
                                <select name="tags" id="card_tags"
                                    class="form-control form-control-sm select2-multiple select2-tags select2-hidden-accessible"
                                    multiple="" tabindex="-1" aria-hidden="true">
                                    <!--array of selected tags-->
                                    <!--/#array of selected tags-->
                                    <option value="android">
                                        android
                                    </option>
                                    <option value="blog-post">
                                        blog-post
                                    </option>
                                    <option value="content-writing">
                                        content-writing
                                    </option>
                                    <option value="copy-writing">
                                        copy-writing
                                    </option>
                                    <option value="graphic-design">
                                        graphic-design
                                    </option>
                                    <option value="high-resolution">
                                        high-resolution
                                    </option>
                                    <option value="illustrator">
                                        illustrator
                                    </option>
                                    <option value="ios">
                                        ios
                                    </option>
                                    <option value="logo-design">
                                        logo-design
                                    </option>
                                    <option value="mockups">
                                        mockups
                                    </option>
                                    <option value="photoshop">
                                        photoshop
                                    </option>
                                    <option value="psd">
                                        psd
                                    </option>
                                    <option value="sketch">
                                        sketch
                                    </option>
                                    <option value="wireframes">
                                        wireframes
                                    </option>
                                </select><span class="select2 select2-container select2-container--bootstrap"
                                    dir="ltr"><span class="selection"><span
                                            class="select2-selection select2-selection--multiple form-control form-control-sm"
                                            role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                            <ul class="select2-selection__rendered">
                                                <li class="select2-search select2-search--inline"><input
                                                        class="select2-search__field" type="search" tabindex="-1"
                                                        autocomplete="off" autocorrect="off" autocapitalize="none"
                                                        spellcheck="false" role="textbox" aria-autocomplete="list"
                                                        placeholder="" style="width: 0.75em;"></li>
                                            </ul>
                                        </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                <div id="card-edit-tags-buttons" class="p-t-10 hidden text-right display-block">
                                    <button type="button" class="btn waves-effect waves-light btn-xs btn-default"
                                        id="card-tags-button-cancel">Close</button>
                                    <button type="button"
                                        class="btn waves-effect waves-light btn-xs btn-danger ajax-request"
                                        data-url="https://midnight.growcrm.io/tasks/103/update-tags"
                                        data-progress-bar="hidden" data-type="form" data-form-id="card-tags-container"
                                        data-ajax-type="post" id="card-tags-button-save">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--[dependency][lock-1] end-->

                    <!----------actions----------->
                    <div class="x-section">
                        <div class="x-title">
                            <h6>Actions</h6>
                        </div>

                        <!--track if we have any actions-->

                        <!--change milestone-->
                        <div class="x-element x-action js-card-settings-button-static" data-container=".card-modal"
                            id="card-task-milestone" tabindex="0" data-popover-content="card-task-milestones"
                            data-title="Milestone" data-original-title="" title=""><i class="mdi mdi-redo-variant"></i>
                            <span class="x-highlight">Change Milestone</span>
                        </div>

                        <!--stop all timer-->
                        <div class="x-element x-action confirm-action-danger" data-confirm-title="Stop All Timers"
                            data-confirm-text="Are you sure?"
                            data-url="https://midnight.growcrm.io/tasks/timer/103/stopall?source=card"><i
                                class="mdi mdi-timer-off"></i>
                            <span class="x-highlight" id="task-start-date">Stop All Timers</span>
                        </div>


                        <!--archive-->
                        <div class="x-element x-action confirm-action-info   card_archive_button_103"
                            id="card_archive_button_103" data-confirm-title="Archive Task"
                            data-confirm-text="Are you sure?" data-ajax-type="PUT"
                            data-url="https://midnight.growcrm.io/tasks/103/archive"><i class="mdi mdi-archive"></i>
                            <span class="x-highlight" id="task-start-date">Archive</span></div>

                        <!--restore-->
                        <div class="x-element x-action confirm-action-info  hidden card_restore_button_103"
                            id="card_restore_button_103" data-confirm-title="Restore Task"
                            data-confirm-text="Are you sure?" data-ajax-type="PUT"
                            data-url="https://midnight.growcrm.io/tasks/103/activate"><i class="mdi mdi-archive"></i>
                            <span class="x-highlight" id="task-start-date">Restore</span></div>

                        <!--delete-->
                        <div class="x-element x-action confirm-action-danger" data-confirm-title="Delete Item"
                            data-confirm-text="Are you sure?" data-ajax-type="DELETE"
                            data-url="https://midnight.growcrm.io?ref=list/tasks/103"><i class="mdi mdi-delete"></i>
                            <span class="x-highlight" id="task-start-date">Delete</span></div>


                        <!--no action available-->

                    </div>

                    <!----------meta infor----------->
                    <div class="x-section">
                        <div class="x-title">
                            <h6>Information</h6>
                        </div>
                        <div class="x-element x-action">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <td>Task ID</td>
                                        <td><strong>#103</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Created By</td>
                                        <td><strong>Steven Mallet</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Date Created</td>
                                        <td><strong>08-09-2022</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Total Time</td>
                                        <td><strong><span id="task_timer_all_card_103">00<span
                                                        class="timer-deliminator">:</span>00</span></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Time Invoiced</td>
                                        <td><strong><span id="task_timer_all_card_103">00<span
                                                        class="timer-deliminator">:</span>00</span></strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Project</td>
                                        <td><strong><a href="https://midnight.growcrm.io/projects/48?ref=list"
                                                    target="_blank">#48</a></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--[dependency][lock-3] end-->
                </div>
            </div>
        </div>
    </div>
</div>