<?php


namespace xooooooox\model;


use Illuminate\Database\Eloquent\Model as BaseModel;


/**
 * Class Helper
 * @package xooooooox\model
 */
class Helper extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'test';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;



    /**
     * @param array $insert
     * @return int
     */
    public function AddOne(array $insert = []) : int {
        if ($insert === []){
            return 0;
        }
        return $this->query()->insertGetId($insert);
    }

    /**
     * @param int $id
     * @return int
     */
    public function DelOne(int $id) : int {
        $rows = $this->query()
            ->where($this->primaryKey,$id)
            ->delete();
        if (!is_int($rows)){
            return 0;
        }
        return $rows;
    }

    /**
     * @param int $id
     * @param array $update
     * @return int
     */
    public function ModOne(int $id, array $update = []) : int {
        if ($update === []){
            return 0;
        }
        $rows = $this->query()
            ->where($this->primaryKey,$id)
            ->update($update);
        if (!is_int($rows)){
            return 0;
        }
        return $rows;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function Exists(int $id) : bool {
        $first = $this->query()
            ->where($this->primaryKey,$id)
            ->first([$this->primaryKey]);
        if (is_null($first)){
            return false;
        }
        return true;
    }

    /**
     * @param int $id
     * @param array|string[] $cols
     * @return array
     */
    public function AscFirst(int $id, array $cols = ['*']) : array {
        $first = $this->query()
            ->where($this->primaryKey,$id)
            ->orderBy($this->primaryKey)
            ->first($cols);
        if (is_null($first)){
            return [];
        }
        return $first->toArray();
    }

    /**
     * @param int $id
     * @param array|string[] $cols
     * @return array
     */
    public function DescFirst(int $id, array $cols = ['*']) : array {
        $first = $this->query()
            ->where($this->primaryKey,$id)
            ->orderByDesc($this->primaryKey)
            ->first($cols);
        if (is_null($first)){
            return [];
        }
        return $first->toArray();
    }

}