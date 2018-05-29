<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_DLP_GooglePrivacyDlpV2beta2AnalyzeDataSourceRiskDetails extends Google_Model
{
  protected $categoricalStatsResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta2CategoricalStatsResult';
  protected $categoricalStatsResultDataType = '';
  protected $kAnonymityResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta2KAnonymityResult';
  protected $kAnonymityResultDataType = '';
  protected $kMapEstimationResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta2KMapEstimationResult';
  protected $kMapEstimationResultDataType = '';
  protected $lDiversityResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta2LDiversityResult';
  protected $lDiversityResultDataType = '';
  protected $numericalStatsResultType = 'Google_Service_DLP_GooglePrivacyDlpV2beta2NumericalStatsResult';
  protected $numericalStatsResultDataType = '';
  protected $requestedPrivacyMetricType = 'Google_Service_DLP_GooglePrivacyDlpV2beta2PrivacyMetric';
  protected $requestedPrivacyMetricDataType = '';
  protected $requestedSourceTableType = 'Google_Service_DLP_GooglePrivacyDlpV2beta2BigQueryTable';
  protected $requestedSourceTableDataType = '';

  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta2CategoricalStatsResult
   */
  public function setCategoricalStatsResult(Google_Service_DLP_GooglePrivacyDlpV2beta2CategoricalStatsResult $categoricalStatsResult)
  {
    $this->categoricalStatsResult = $categoricalStatsResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta2CategoricalStatsResult
   */
  public function getCategoricalStatsResult()
  {
    return $this->categoricalStatsResult;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta2KAnonymityResult
   */
  public function setKAnonymityResult(Google_Service_DLP_GooglePrivacyDlpV2beta2KAnonymityResult $kAnonymityResult)
  {
    $this->kAnonymityResult = $kAnonymityResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta2KAnonymityResult
   */
  public function getKAnonymityResult()
  {
    return $this->kAnonymityResult;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta2KMapEstimationResult
   */
  public function setKMapEstimationResult(Google_Service_DLP_GooglePrivacyDlpV2beta2KMapEstimationResult $kMapEstimationResult)
  {
    $this->kMapEstimationResult = $kMapEstimationResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta2KMapEstimationResult
   */
  public function getKMapEstimationResult()
  {
    return $this->kMapEstimationResult;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta2LDiversityResult
   */
  public function setLDiversityResult(Google_Service_DLP_GooglePrivacyDlpV2beta2LDiversityResult $lDiversityResult)
  {
    $this->lDiversityResult = $lDiversityResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta2LDiversityResult
   */
  public function getLDiversityResult()
  {
    return $this->lDiversityResult;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta2NumericalStatsResult
   */
  public function setNumericalStatsResult(Google_Service_DLP_GooglePrivacyDlpV2beta2NumericalStatsResult $numericalStatsResult)
  {
    $this->numericalStatsResult = $numericalStatsResult;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta2NumericalStatsResult
   */
  public function getNumericalStatsResult()
  {
    return $this->numericalStatsResult;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta2PrivacyMetric
   */
  public function setRequestedPrivacyMetric(Google_Service_DLP_GooglePrivacyDlpV2beta2PrivacyMetric $requestedPrivacyMetric)
  {
    $this->requestedPrivacyMetric = $requestedPrivacyMetric;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta2PrivacyMetric
   */
  public function getRequestedPrivacyMetric()
  {
    return $this->requestedPrivacyMetric;
  }
  /**
   * @param Google_Service_DLP_GooglePrivacyDlpV2beta2BigQueryTable
   */
  public function setRequestedSourceTable(Google_Service_DLP_GooglePrivacyDlpV2beta2BigQueryTable $requestedSourceTable)
  {
    $this->requestedSourceTable = $requestedSourceTable;
  }
  /**
   * @return Google_Service_DLP_GooglePrivacyDlpV2beta2BigQueryTable
   */
  public function getRequestedSourceTable()
  {
    return $this->requestedSourceTable;
  }
}
