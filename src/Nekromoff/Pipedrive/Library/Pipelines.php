<?php
namespace Nekromoff\Pipedrive\Library;

use Nekromoff\Pipedrive\Exceptions\PipedriveMissingFieldError;

/**
 * Pipedrive Pipelines Methods
 *
 * pipelines
 *
 */
class Pipelines
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
     * Returns a pipeline
     *
     * @param  int   $id pipedrive pipelines id
     * @return array returns detials of a pipeline
     */
    public function getById($id)
    {
        return $this->curl->get('pipelines/' . $id);
    }

    /**
     * Returns an pipeline
     *
     * @param  string $name pipedrive pipelines name
     * @param  array  $data (start, limit)
     * @return array  returns detials of a pipeline
     */
    public function getByName($name, array $data = array())
    {
        $data['term'] = $name;
        return $this->curl->get('pipelines/find', $data);
    }

    /**
     * Returns all pipelines
     *
     * @param  array $data (filter_id, start, limit, sort_by, sort_mode)
     * @return array returns detials of all pipelines
     */
    public function getAll(array $data = array())
    {
        return $this->curl->get('pipelines/', $data);
    }

    /**
     * Updates an pipeline
     *
     * @param  int   $pipelineId pipedrives pipeline Id
     * @param  array $data     new detials of pipeline
     * @return array returns detials of a pipeline
     */
    public function update($pipelineId, array $data = array())
    {
        return $this->curl->put('pipelines/' . $pipelineId, $data);
    }

    /**
     * Adds a pipeline
     *
     * @param  array $data pipelines detials
     * @return array returns detials of a pipeline
     */
    public function add(array $data)
    {
        //if there is no name set throw error as it is a required field
        if (!isset($data['name'])) {
            throw new PipedriveMissingFieldError('You must include a "name" field when inserting a pipeline');
        }

        return $this->curl->post('pipelines', $data);
    }

    /**
     * Deletes an pipeline
     *
     * @param  int   $pipelineId pipedrives pipeline Id
     * @return array returns detials of a pipeline
     */
    public function delete($pipelineId)
    {
        return $this->curl->delete('pipelines/' . $pipelineId);
    }
}
