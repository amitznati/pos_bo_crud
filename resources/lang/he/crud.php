<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'שמור ופריט חדש',
    'save_action_save_and_edit' => 'שמור וערוך פריט זה',
    'save_action_save_and_back' => 'שמור וחזור',
    'save_action_changed_notification' => 'התנהגות ברירת המחדל לאחר שמירה השתנתה.',

    // Create form
    'add'                 => 'הוסף ',
    'back_to_all'         => 'חזרה לכול ',
    'cancel'              => 'ביטול',
    'add_a_new'           => 'הוסף ',
    'select'           => 'בחר ',

    // Edit form
    'edit'                 => 'ערוך',
    'save'                 => 'שמור',

    // Revisions
    'revisions'            => 'גרסאות',
    'no_revisions'         => 'לא נמצאו גרסאות',
    'created_this'          => 'יצר את זה',
    'changed_the'          => 'שינה את',
    'restore_this_value'   => 'שחזר ערך זה',
    'from'                 => 'מ',
    'to'                   => 'אל',
    'undo'                 => 'בטל',
    'revision_restored'    => 'גרסא שוחזרה בהצלחה',

    // CRUD table view
    'all'                       => 'כל ה',
    'id'                        => 'קוד',
    'created_at'                => 'נוצר בתאריך',
    'updated_at'                => 'שונה בתאריך',
    'deleted_at'                => 'נמחק בתאריך',
    'in_the_database'           => 'במאגר הנתונים',
    'list'                      => 'רשימה',
    'actions'                   => 'פעולות',
    'preview'                   => 'תצוגה מקדימה',
    'delete'                    => 'מחק',
    'admin'                     => 'Admin',
    'details_row'               => 'זוהי שורת הפרטים. שנה כרצונך. ',
    'details_row_loading_error' => 'אירעה שגיאה בטעינת הפרטים. נסה שוב. ',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'האם אתה בטוח שברצונך למחוק פריט זה?',
        'delete_confirmation_title'                   => 'פריט נמחק',
        'delete_confirmation_message'                 => 'הפריט נמחק בהצלחה.',
        'delete_confirmation_not_title'               => 'לא נמחק',
        'delete_confirmation_not_message'             => "אירעה שגיאה.הפריט שלך אולי לא נמחק.",
        'delete_confirmation_not_deleted_title'       => 'לא נמחק',
        'delete_confirmation_not_deleted_message'     => 'שום דבר לא קרה. הפריט שלך בטוח.',

        // DataTables translation
        'emptyTable'     => 'אין נתונים זמינים בטבלה',
        'info'           => 'מציג _START_ עד _END_ מתוך _TOTAL_ ערכים',
        'infoEmpty'      => 'מציג 0 עד 0 מתוך 0 ערכים',
        'infoFiltered'   => '(מסננים מתוך _MAX_ סהך ערכים)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '__MENU_ ערכים לדף',
        'loadingRecords' => 'טוען...',
        'processing'     => 'מעבד...',
        'search'         => 'חפש: ',
        'zeroRecords'    => 'לא נמצאו רשומות תואמות',
        'paginate'       => [
            'first'    => 'ראשון',
            'last'     => 'אחרון',
            'next'     => 'הבא',
            'previous' => 'הקודם',
        ],
        'aria' => [
            'sortAscending'  => ': הפעל למיין עמודה עולה',
            'sortDescending' => ': הפעל למיון עמודה יורדת',
        ],

    // global crud - errors
        'unauthorized_access' => 'גישה לא מורשית - אין לך את ההרשאות הדרושות כדי לראות את הדף.',
        'please_fix' => 'אנא תקן את השגיאות הבאות:',

    // global crud - success / error notification bubbles
        'insert_success' => 'הפריט נוסף בהצלחה.',
        'update_success' => 'הפריט השתנה בהצלחה.',

    // CRUD reorder view
        'reorder'                      => 'רשומה',
        'reorder_text'                 => 'השתמש גרור ושחרר כדי לסדר מחדש.',
        'reorder_success_title'        => 'בוצע',
        'reorder_success_message'      => 'הסדר שלך שונה בהצלחה',
        'reorder_error_title'          => 'שגיאה',
        'reorder_error_message'        => 'הסדר שלך לא נשמר.',

    // CRUD yes/no
        'yes' => 'כן',
        'no' => 'לא',

    // Fields
        'browse_uploads' => 'עיין בהעלאות',
        'clear' => 'נקה',
        'page_link' => 'קישור לדף',
        'page_link_placeholder' => 'http://example.com/your-desired-page',
        'internal_link' => 'קישור פנימי',
        'internal_link_placeholder' => 'Internal slug. Ex: \'admin/page\' (no quotes) for \':url\'',
        'external_link' => 'קישור חיצוני',
        'choose_file' => 'בחר דף',

    //Table field
        'table_cant_add' => 'לא יכול לצור :entity חדש',
        'table_max_reached' => 'מספר מרבי של :max הגיע',

    // File manager
    'file_manager' => 'מנהל קבצים',
];
