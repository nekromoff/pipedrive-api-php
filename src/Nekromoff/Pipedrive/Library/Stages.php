<?php
namespace Nekromoff\Pipedrive\Library;

use Nekromoff\Pipedrive\Exceptions\PipedriveMissingFieldError;

/**
 * Pipedrive Stages Methods
 *
 * stages
 *
 */
class Stages
{
    /**
     * Hold the pipedrive cURL session
     * @var Curl Object
     */
    protected $curl;

    /**
     * Initialise the object load master class
     */
    public function __construct(\Nekromoff\Pipedrive\Pipedrive $master)
    {
        //associate curl class
        $this->curl = $master->curl();
    }

    /**
     * Returns a stage
     *
     * @param  int   $id pipedrive stages id
     * @return array returns detials of a stage
     */
    public function getById($id)
    {
        return $this->curl->get('stages/' . $id);
    }

    /**
     * Returns an stage
     *
     * @param  string $name pipedrive stages name
     * @param  array  $data (start, limit)
     * @return array  returns detials of a stage
     */
    public function getByName($name, array $data = array())
    {
        $data['term'] = $name;
        return $this->curl->get('stages/find', $data);
    }

    /**
     * Returns all stages
     *
     * @param  array $data (filter_id, start, limit, sort_by, sort_mode)
     * @return array returns detials of all stages
     */
    public function getAll(array $data = array())
    {
        return $this->curl->get('stages/', $data);
    }

    /**
     * Updates an stage
     *
     * @param  int   $stageId pipedrives stage Id
     * @param  array $data     new detials of stage
     * @return array returns detials of a stage
     */
    public function update($stageId, array $data = array())
    {
        return $this->curl->put('stages/' . $stageId, $data);
    }

    /**
     * Adds a stage
     *
     * @param  array $data stages detials
     * @return array returns detials of a stage
     */
    public function add(array $data)
    {
        //if there is no name set throw error as it is a required field
        if (!isset($data['name'])) {
            throw new PipedriveMissingFieldError('You must include a "name" field when inserting a stage');
        }

        return $this->curl->post('stages', $data);
    }

    /**
     * Deletes an stage
     *
     * @param  int   $stageId pipedrives stage Id
     * @return array returns detials of a stage
     */
    public function delete($stageId)
    {
        return $this->curl->delete('stages/' . $stageId);
    }
}
