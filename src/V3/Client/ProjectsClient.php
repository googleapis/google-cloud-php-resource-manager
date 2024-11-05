<?php
/*
 * Copyright 2024 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/resourcemanager/v3/projects.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\ResourceManager\V3\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\OperationResponse;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Iam\V1\GetIamPolicyRequest;
use Google\Cloud\Iam\V1\Policy;
use Google\Cloud\Iam\V1\SetIamPolicyRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsRequest;
use Google\Cloud\Iam\V1\TestIamPermissionsResponse;
use Google\Cloud\ResourceManager\V3\CreateProjectRequest;
use Google\Cloud\ResourceManager\V3\DeleteProjectRequest;
use Google\Cloud\ResourceManager\V3\GetProjectRequest;
use Google\Cloud\ResourceManager\V3\ListProjectsRequest;
use Google\Cloud\ResourceManager\V3\MoveProjectRequest;
use Google\Cloud\ResourceManager\V3\Project;
use Google\Cloud\ResourceManager\V3\SearchProjectsRequest;
use Google\Cloud\ResourceManager\V3\UndeleteProjectRequest;
use Google\Cloud\ResourceManager\V3\UpdateProjectRequest;
use Google\LongRunning\Client\OperationsClient;
use Google\LongRunning\Operation;
use GuzzleHttp\Promise\PromiseInterface;

/**
 * Service Description: Manages Google Cloud Projects.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface<OperationResponse> createProjectAsync(CreateProjectRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<OperationResponse> deleteProjectAsync(DeleteProjectRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Policy> getIamPolicyAsync(GetIamPolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Project> getProjectAsync(GetProjectRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> listProjectsAsync(ListProjectsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<OperationResponse> moveProjectAsync(MoveProjectRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> searchProjectsAsync(SearchProjectsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Policy> setIamPolicyAsync(SetIamPolicyRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<TestIamPermissionsResponse> testIamPermissionsAsync(TestIamPermissionsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<OperationResponse> undeleteProjectAsync(UndeleteProjectRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<OperationResponse> updateProjectAsync(UpdateProjectRequest $request, array $optionalArgs = [])
 */
final class ProjectsClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.cloud.resourcemanager.v3.Projects';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'cloudresourcemanager.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'cloudresourcemanager.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/cloud-platform.read-only',
    ];

    private $operationsClient;

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/projects_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/projects_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/projects_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/projects_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Return an OperationsClient object with the same endpoint as $this.
     *
     * @return OperationsClient
     */
    public function getOperationsClient()
    {
        return $this->operationsClient;
    }

    /**
     * Resume an existing long running operation that was previously started by a long
     * running API method. If $methodName is not provided, or does not match a long
     * running API method, then the operation can still be resumed, but the
     * OperationResponse object will not deserialize the final response.
     *
     * @param string $operationName The name of the long running operation
     * @param string $methodName    The name of the method used to start the operation
     *
     * @return OperationResponse
     */
    public function resumeOperation($operationName, $methodName = null)
    {
        $options = isset($this->descriptors[$methodName]['longRunning'])
            ? $this->descriptors[$methodName]['longRunning']
            : [];
        $operation = new OperationResponse($operationName, $this->getOperationsClient(), $options);
        $operation->reload();
        return $operation;
    }

    /**
     * Create the default operation client for the service.
     *
     * @param array $options ClientOptions for the client.
     *
     * @return OperationsClient
     */
    private function createOperationsClient(array $options)
    {
        // Unset client-specific configuration options
        unset($options['serviceName'], $options['clientConfig'], $options['descriptorsConfigPath']);

        if (isset($options['operationsClient'])) {
            return $options['operationsClient'];
        }

        return new OperationsClient($options);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a project
     * resource.
     *
     * @param string $project
     *
     * @return string The formatted project resource.
     */
    public static function projectName(string $project): string
    {
        return self::getPathTemplate('project')->render([
            'project' => $project,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - project: projects/{project}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string $formattedName The formatted name string
     * @param string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'cloudresourcemanager.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
        $this->operationsClient = $this->createOperationsClient($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Request that a new project be created. The result is an `Operation` which
     * can be used to track the creation process. This process usually takes a few
     * seconds, but can sometimes take much longer. The tracking `Operation` is
     * automatically deleted after a few hours, so there is no need to call
     * `DeleteOperation`.
     *
     * The async variant is {@see ProjectsClient::createProjectAsync()} .
     *
     * @example samples/V3/ProjectsClient/create_project.php
     *
     * @param CreateProjectRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createProject(CreateProjectRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('CreateProject', $request, $callOptions)->wait();
    }

    /**
     * Marks the project identified by the specified
     * `name` (for example, `projects/415104041262`) for deletion.
     *
     * This method will only affect the project if it has a lifecycle state of
     * [ACTIVE][google.cloud.resourcemanager.v3.Project.State.ACTIVE].
     *
     * This method changes the Project's lifecycle state from
     * [ACTIVE][google.cloud.resourcemanager.v3.Project.State.ACTIVE]
     * to
     * [DELETE_REQUESTED][google.cloud.resourcemanager.v3.Project.State.DELETE_REQUESTED].
     * The deletion starts at an unspecified time,
     * at which point the Project is no longer accessible.
     *
     * Until the deletion completes, you can check the lifecycle state
     * checked by retrieving the project with [GetProject]
     * [google.cloud.resourcemanager.v3.Projects.GetProject],
     * and the project remains visible to [ListProjects]
     * [google.cloud.resourcemanager.v3.Projects.ListProjects].
     * However, you cannot update the project.
     *
     * After the deletion completes, the project is not retrievable by
     * the  [GetProject]
     * [google.cloud.resourcemanager.v3.Projects.GetProject],
     * [ListProjects]
     * [google.cloud.resourcemanager.v3.Projects.ListProjects], and
     * [SearchProjects][google.cloud.resourcemanager.v3.Projects.SearchProjects]
     * methods.
     *
     * This method behaves idempotently, such that deleting a `DELETE_REQUESTED`
     * project will not cause an error, but also won't do anything.
     *
     * The caller must have `resourcemanager.projects.delete` permissions for this
     * project.
     *
     * The async variant is {@see ProjectsClient::deleteProjectAsync()} .
     *
     * @example samples/V3/ProjectsClient/delete_project.php
     *
     * @param DeleteProjectRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteProject(DeleteProjectRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('DeleteProject', $request, $callOptions)->wait();
    }

    /**
     * Returns the IAM access control policy for the specified project, in the
     * format `projects/{ProjectIdOrNumber}` e.g. projects/123.
     * Permission is denied if the policy or the resource do not exist.
     *
     * The async variant is {@see ProjectsClient::getIamPolicyAsync()} .
     *
     * @example samples/V3/ProjectsClient/get_iam_policy.php
     *
     * @param GetIamPolicyRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Policy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getIamPolicy(GetIamPolicyRequest $request, array $callOptions = []): Policy
    {
        return $this->startApiCall('GetIamPolicy', $request, $callOptions)->wait();
    }

    /**
     * Retrieves the project identified by the specified `name` (for example,
     * `projects/415104041262`).
     *
     * The caller must have `resourcemanager.projects.get` permission
     * for this project.
     *
     * The async variant is {@see ProjectsClient::getProjectAsync()} .
     *
     * @example samples/V3/ProjectsClient/get_project.php
     *
     * @param GetProjectRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Project
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getProject(GetProjectRequest $request, array $callOptions = []): Project
    {
        return $this->startApiCall('GetProject', $request, $callOptions)->wait();
    }

    /**
     * Lists projects that are direct children of the specified folder or
     * organization resource. `list()` provides a strongly consistent view of the
     * projects underneath the specified parent resource. `list()` returns
     * projects sorted based upon the (ascending) lexical ordering of their
     * `display_name`. The caller must have `resourcemanager.projects.list`
     * permission on the identified parent.
     *
     * The async variant is {@see ProjectsClient::listProjectsAsync()} .
     *
     * @example samples/V3/ProjectsClient/list_projects.php
     *
     * @param ListProjectsRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listProjects(ListProjectsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListProjects', $request, $callOptions);
    }

    /**
     * Move a project to another place in your resource hierarchy, under a new
     * resource parent.
     *
     * Returns an operation which can be used to track the process of the project
     * move workflow.
     * Upon success, the `Operation.response` field will be populated with the
     * moved project.
     *
     * The caller must have `resourcemanager.projects.move` permission on the
     * project, on the project's current and proposed new parent.
     *
     * If project has no current parent, or it currently does not have an
     * associated organization resource, you will also need the
     * `resourcemanager.projects.setIamPolicy` permission in the project.
     *
     *
     *
     * The async variant is {@see ProjectsClient::moveProjectAsync()} .
     *
     * @example samples/V3/ProjectsClient/move_project.php
     *
     * @param MoveProjectRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function moveProject(MoveProjectRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('MoveProject', $request, $callOptions)->wait();
    }

    /**
     * Search for projects that the caller has both `resourcemanager.projects.get`
     * permission on, and also satisfy the specified query.
     *
     * This method returns projects in an unspecified order.
     *
     * This method is eventually consistent with project mutations; this means
     * that a newly created project may not appear in the results or recent
     * updates to an existing project may not be reflected in the results. To
     * retrieve the latest state of a project, use the
     * [GetProject][google.cloud.resourcemanager.v3.Projects.GetProject] method.
     *
     * The async variant is {@see ProjectsClient::searchProjectsAsync()} .
     *
     * @example samples/V3/ProjectsClient/search_projects.php
     *
     * @param SearchProjectsRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function searchProjects(SearchProjectsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('SearchProjects', $request, $callOptions);
    }

    /**
     * Sets the IAM access control policy for the specified project, in the
     * format `projects/{ProjectIdOrNumber}` e.g. projects/123.
     *
     * CAUTION: This method will replace the existing policy, and cannot be used
     * to append additional IAM settings.
     *
     * Note: Removing service accounts from policies or changing their roles can
     * render services completely inoperable. It is important to understand how
     * the service account is being used before removing or updating its roles.
     *
     * The following constraints apply when using `setIamPolicy()`:
     *
     * + Project does not support `allUsers` and `allAuthenticatedUsers` as
     * `members` in a `Binding` of a `Policy`.
     *
     * + The owner role can be granted to a `user`, `serviceAccount`, or a group
     * that is part of an organization. For example,
     * group&#64;myownpersonaldomain.com could be added as an owner to a project in
     * the myownpersonaldomain.com organization, but not the examplepetstore.com
     * organization.
     *
     * + Service accounts can be made owners of a project directly
     * without any restrictions. However, to be added as an owner, a user must be
     * invited using the Cloud Platform console and must accept the invitation.
     *
     * + A user cannot be granted the owner role using `setIamPolicy()`. The user
     * must be granted the owner role using the Cloud Platform Console and must
     * explicitly accept the invitation.
     *
     * + Invitations to grant the owner role cannot be sent using
     * `setIamPolicy()`;
     * they must be sent only using the Cloud Platform Console.
     *
     * + If the project is not part of an organization, there must be at least
     * one owner who has accepted the Terms of Service (ToS) agreement in the
     * policy. Calling `setIamPolicy()` to remove the last ToS-accepted owner
     * from the policy will fail. This restriction also applies to legacy
     * projects that no longer have owners who have accepted the ToS. Edits to
     * IAM policies will be rejected until the lack of a ToS-accepting owner is
     * rectified. If the project is part of an organization, you can remove all
     * owners, potentially making the organization inaccessible.
     *
     * The async variant is {@see ProjectsClient::setIamPolicyAsync()} .
     *
     * @example samples/V3/ProjectsClient/set_iam_policy.php
     *
     * @param SetIamPolicyRequest $request     A request to house fields associated with the call.
     * @param array               $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Policy
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function setIamPolicy(SetIamPolicyRequest $request, array $callOptions = []): Policy
    {
        return $this->startApiCall('SetIamPolicy', $request, $callOptions)->wait();
    }

    /**
     * Returns permissions that a caller has on the specified project, in the
     * format `projects/{ProjectIdOrNumber}` e.g. projects/123..
     *
     * The async variant is {@see ProjectsClient::testIamPermissionsAsync()} .
     *
     * @example samples/V3/ProjectsClient/test_iam_permissions.php
     *
     * @param TestIamPermissionsRequest $request     A request to house fields associated with the call.
     * @param array                     $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return TestIamPermissionsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function testIamPermissions(
        TestIamPermissionsRequest $request,
        array $callOptions = []
    ): TestIamPermissionsResponse {
        return $this->startApiCall('TestIamPermissions', $request, $callOptions)->wait();
    }

    /**
     * Restores the project identified by the specified
     * `name` (for example, `projects/415104041262`).
     * You can only use this method for a project that has a lifecycle state of
     * [DELETE_REQUESTED]
     * [Projects.State.DELETE_REQUESTED].
     * After deletion starts, the project cannot be restored.
     *
     * The caller must have `resourcemanager.projects.undelete` permission for
     * this project.
     *
     * The async variant is {@see ProjectsClient::undeleteProjectAsync()} .
     *
     * @example samples/V3/ProjectsClient/undelete_project.php
     *
     * @param UndeleteProjectRequest $request     A request to house fields associated with the call.
     * @param array                  $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function undeleteProject(UndeleteProjectRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('UndeleteProject', $request, $callOptions)->wait();
    }

    /**
     * Updates the `display_name` and labels of the project identified by the
     * specified `name` (for example, `projects/415104041262`). Deleting all
     * labels requires an update mask for labels field.
     *
     * The caller must have `resourcemanager.projects.update` permission for this
     * project.
     *
     * The async variant is {@see ProjectsClient::updateProjectAsync()} .
     *
     * @example samples/V3/ProjectsClient/update_project.php
     *
     * @param UpdateProjectRequest $request     A request to house fields associated with the call.
     * @param array                $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return OperationResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function updateProject(UpdateProjectRequest $request, array $callOptions = []): OperationResponse
    {
        return $this->startApiCall('UpdateProject', $request, $callOptions)->wait();
    }
}
