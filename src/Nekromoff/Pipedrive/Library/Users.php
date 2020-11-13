<?php
namespace Nekromoff\Pipedrive\Library;

use Nekromoff\Pipedrive\Exceptions\PipedriveMissingFieldError;

/**
 * Pipedrive Users Methods
 *
 * Users
 *
 */
class Users
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
     * Returns a user
     *
     * @param  int   $id pipedrive users id
     * @return array returns detials of a user
     */
    public function getById($id)
    {
        return $this->curl->get('users/' . $id);
    }

    /**
     * Returns an user
     *
     * @param  string $name pipedrive users name
     * @param  array  $data (start, limit)
     * @return array  returns detials of a user
     */
    public function getByName($name, array $data = array())
    {
        $data['term'] = $name;
        return $this->curl->get('users/find', $data);
    }

    /**
     * Returns all users
     *
     * @param  array $data (filter_id, start, limit, sort_by, sort_mode)
     * @return array returns detials of all users
     */
    public function getAll(array $data = array())
    {
        return $this->curl->get('users/', $data);
    }

    /**
     * Updates an user
     *
     * @param  int   $userId pipedrives user Id
     * @param  array $data     new detials of user
     * @return array returns detials of a user
     */
    public function update($userId, array $data = array())
    {
        return $this->curl->put('users/' . $userId, $data);
    }

    /**
     * Adds a user
     *
     * @param  array $data users detials
     * @return array returns detials of a user
     */
    public function add(array $data)
    {
        //if there is no name set throw error as it is a required field
        if (!isset($data['name'])) {
            throw new PipedriveMissingFieldError('You must include a "name" field when inserting a user');
        }

        return $this->curl->post('users', $data);
    }

    /**
     * Deletes an user
     *
     * @param  int   $userId pipedrives user Id
     * @return array returns detials of a user
     */
    public function delete($userId)
    {
        return $this->curl->delete('users/' . $userId);
    }
}
