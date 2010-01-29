<?php
////////////////////////////////////////////////////////////////////////////////
//           _____                        __   _________
//          /  _  \   ______ ______ _____/  |_ \_   ___ \  ______ ______
//         /  /_\  \ /  ___//  ___// __ \   __\/    \  \/ /  ___//  ___/
//        /    |    \\___ \ \___ \\  ___/|  |  \     \____\___ \ \___ \
//        \____|__  /____  >____  >\___  >__|   \______  /____  >____  >
//               \/     \/     \/     \/              \/     \/     \/
// =============================================================================
//         Designed and Developed by Brad Jones  <brad @="bjc.id.au" />
// =============================================================================
//
// >>> $Id$
//
////////////////////////////////////////////////////////////////////////////////

class Assetcss extends Record
{
    // The real Table Name
    const TABLE_NAME = 'assetcss';

    // Our Columns / Properties
    public $name;
    public $content;
    public $content_compressed;
    public $created_on;
    public $updated_on;
    public $created_by_id;
    public $updated_by_id;

    /**
     * Method: beforeInsert
     * =========================================================================
     * Run before the record is inserted into the db.
     *
     * Parameters:
     * -------------------------------------------------------------------------
     * none
     *
     * Returns:
     * -------------------------------------------------------------------------
     * bool
     */
    public function beforeInsert()
    {
        $this->created_by_id = AuthUser::getId();
        $this->created_on = date('Y-m-d H:i:s');
        return true;
    }

    /**
     * Method: beforeUpdate
     * =========================================================================
     * Run before the record is updated in the db.
     *
     * Parameters:
     * -------------------------------------------------------------------------
     * none
     *
     * Returns:
     * -------------------------------------------------------------------------
     * bool
     */
    public function beforeUpdate()
    {
        $this->updated_by_id = AuthUser::getId();
        $this->updated_on = date('Y-m-d H:i:s');
        return true;
    }

    /**
     * Method: beforeSave
     * =========================================================================
     * Run before the record is saved. A save combines the functionality of
     * both the insert of update operations with some other logic.
     *
     * Parameters:
     * -------------------------------------------------------------------------
     * none
     *
     * Returns:
     * -------------------------------------------------------------------------
     * bool
     */
    public function beforeSave()
    {
        // Compress the javascript
        $this->content_compressed = cssmin::minify($this->content);
        return true;
    }

    /**
     * Method: find
     * =========================================================================
     * You can use this and the following methods to search the objects saved
     * into the db.
     *
     * Parameters:
     * -------------------------------------------------------------------------
     * $args - An array to create the final SQL with.
     *
     * Returns:
     * -------------------------------------------------------------------------
     * object
     */
    public static function find($args = null)
    {
        // Collect attributes...
        $where    = isset($args['where']) ? trim($args['where']) : '';
        $order_by = isset($args['order']) ? trim($args['order']) : '';
        $offset   = isset($args['offset']) ? (int) $args['offset'] : 0;
        $limit    = isset($args['limit']) ? (int) $args['limit'] : 0;

        // Prepare query parts
        $where_string = empty($where) ? '' : "WHERE $where";
        $order_by_string = empty($order_by) ? '' : "ORDER BY $order_by";
        $limit_string = $limit > 0 ? "LIMIT $offset, $limit" : '';

        $tablename = self::tableNameFromClassName('Assetcss');
        $tablename_user = self::tableNameFromClassName('User');

        // Prepare SQL
        $sql = "SELECT $tablename.*, creator.name AS created_by_name, updater.name AS updated_by_name FROM $tablename".
        " LEFT JOIN $tablename_user AS creator ON $tablename.created_by_id = creator.id".
        " LEFT JOIN $tablename_user AS updater ON $tablename.updated_by_id = updater.id".
        " $where_string $order_by_string $limit_string";

        $stmt = self::$__CONN__->prepare($sql);
        $stmt->execute();

        // Run!
        if ($limit == 1)
        {
            return $stmt->fetchObject('Assetcss');
        }
        else
        {
            $objects = array();
            while ($object = $stmt->fetchObject('Assetcss'))
            {
                $objects[] = $object;
            }
            return $objects;
        }
    }

    /**
     * Method: findAll
     * =========================================================================
     * An alias of the find function above...
     *
     * Parameters:
     * -------------------------------------------------------------------------
     * $args - An array to create the final SQL with.
     *
     * Returns:
     * -------------------------------------------------------------------------
     * object
     */
    public static function findAll($args = null)
    {
        return self::find($args);
    }

    /**
     * Method: findById
     * =========================================================================
     * Will search for a javascript asset based on id.
     *
     * Parameters:
     * -------------------------------------------------------------------------
     * $id - The id of the javascript asset
     *
     * Returns:
     * -------------------------------------------------------------------------
     * object
     */
    public static function findById($id)
    {
        return self::find(array
        (
            'where' => self::tableNameFromClassName('Assetcss').'.id='.(int)$id,
            'limit' => 1
        ));
    }
}